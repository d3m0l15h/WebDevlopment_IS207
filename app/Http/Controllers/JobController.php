<?php

namespace App\Http\Controllers;

use App\Mail\SendAcceptResume;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Log;

class JobController extends Controller
{
    public function index()
    {
        if (!Auth::check())
            return abort(404);
        if (auth()->user()->role == 'user')
            return abort(404);
        return view('create_job');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'strength' => 'required',
            'reason' => 'required',
            'required' => 'required',
            'salary' => 'required',
            'salarymin' => 'required',
            'salarymax' => 'required',
            'location' => 'required|in:HCM,HN,DN,CT,Hue',
        ]);
        $job = new Job();
        $job->name = $request->title;
        $job->descriptions = $request->description;
        $job->strength = $request->strength;
        $job->reasons = $request->reason;
        $job->requirements = $request->required;
        $job->salary = $request->salary;
        $job->salarymin = (float)$request->salarymin;
        $job->salarymax = (float)$request->salarymax;
        $job->location = $request->location;
        $job->worktype = $request->worktype;
        $job->worktime = $request->worktime;
        $job->eid = auth()->user()->employer->id;
        $job->save();
        session()->flash('success', 'Job created successfully');
        return redirect()->back();
    }

    public function detail($slug)
    {
        $parts = explode('-', $slug);
        $jobid = end($parts);
        $job = Job::where('id', $jobid)->first();
        $applied = null;

        if (Auth::check()) {
            $applied = Apply::where([['jid', '=', $jobid], ['uid', '=', auth()->user()->user->id]])->get();
        }
       
        if (!$job) {
        // Handle the case where no job with the given slug exists.
        }
        return view('job_details', compact('job', 'applied'));
    }

    public function manage_user_jobs()
    {
        $jobs = Job::all();
        return view('my_jobs', compact('jobs'));
    }

    public function edit_job($id)
    {
        $job = Job::where('id', '=', $id)->get()[0];
        return view('edit_job', compact('job'));
    }

    public function job_request() {
        $employer_id = auth()->user()->employer->id;
        $jobs = Job::where('eid', '=', $employer_id)->get();
        $applies = [];

        if (!empty($jobs)) {
            $job_ids = $jobs->map(fn($item): int => $item->id);
            $applies = Apply::whereIn('jid', $job_ids)->get();
            //Log::info($applies);
        }
        $mapping_status = function($str) { return $this->mapping_status($str); };

        return view('admin_request', compact('applies', 'mapping_status'));
    }

    private function mapping_status($status) {
        if ($status == '2') {
            return 'Đã Trúng Tuyển';
        }

        if ($status == '3') {
            return 'Đã Từ Chối';
        }

        if ($status == '1') {
            return 'Chờ Xác Nhận';
        }
    }

    public function job_accept(Request $request) {
        $user = User::find($request->uid);
        Apply::where([['jid', '=', $request->jid], ['uid', '=', $request->uid]])->update(['status' => $request->status]);
        // Send mail
        // Mail::to($user->mail)->send(new SendAcceptResume($user->name));
        $filePath = public_path($request->cv);
        Mail::to("daokhanhduycm@gmail.com")->send(new SendAcceptResume($user->name, $filePath));
        return redirect()->back();
    }

    public function upload_cv(Request $request) {
        $user = auth()->user()->user;
        $cv = '';

        if ($request->cvfile != null) {
            $cvfile = $request->file('cvfile');
            $ext = $cvfile->extension();
            $final_name = date("YmdHis").$user->name.".".$ext;
            $cvfile->storeAs('/assets/img/resume/', $final_name,['disk' => 'public_uploads']);
            $cv = "assets/img/resume/".$final_name;
        }

        $apply = Apply::create([
            'jid' => (int)$request->jid,
            'uid' => (int)$user->id,
            'cv' => $cv,
            'letter' => $request->letter
        ]);
        // $apply->job()->create(Job::find($request->jid));
        // $apply->user()->create(auth()->user()->user);
        $apply->save();
        return redirect()->back();
    }
}

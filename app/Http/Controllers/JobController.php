<?php

namespace App\Http\Controllers;

use App\Mail\EmployerAcceptResume;
use App\Mail\EmployerDeninedResume;
use App\Mail\UserApplyResume;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;
use Illuminate\Support\Facades\Mail;
use Log;

class JobController extends Controller
{
    public function index() {
        $search_job = request('search');
        $location = request('location');

    if ($search_job && $location) {
        $jobs = Job::where('name', 'like', '%' . $search_job . '%')
                    ->where('location', 'like', '%' . $location . '%')
                    ->get();
    } elseif ($search_job) {
        $jobs = Job::where('name', 'like', '%' . $search_job . '%')->get();
    } elseif ($location) {
        $jobs = Job::where('location', 'like', '%' . $location . '%')->get();
    } else {
        $jobs = Job::paginate(20);
    }

    return view('job.index', compact('jobs'));
    }
    public function show($slug) //job details
    {
        $parts = explode('-', $slug);
        $jobid = end($parts);
        $job = Job::where('id', $jobid)->first();
        $applied = null;

        if (Auth::check()) {
            $applied = Apply::where([['jid', '=', $jobid], ['uid', '=', auth()->user()->user->id]])->get()[0];
        }
       
        if (!$job) {
        // Handle the case where no job with the given slug exists.
        }
        return view('job.detail', compact('job', 'applied'));
    }
    public function create()
    {
        if (!Auth::check())
            return abort(404);
        if (auth()->user()->role != 'employer')
            return abort(404);
        return view('job.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'strength' => 'required',
            'reason' => 'required',
            'required' => 'required',
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
    public function edit($id)
    {
        $job = Job::where('id', '=', $id)->get()[0];
        return view('job.edit', compact('job'));
    }
    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'strength' => 'required',
            'reason' => 'required',
            'required' => 'required',
            'location' => 'required|in:HCM,HN,DN,CT,Hue',
        ],[
            'title.required' => 'The title field cannot empty.',
            'description.required' => 'The description field cannot empty.',
            'strength.required' => 'The strength field cannot empty.',
            'reason.required' => 'The reason field cannot empty.',
            'required.required' => 'The required field cannot empty.',
        ]);
        $job = Job::find($request->id);
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
        $job->save();
        session()->flash('success', 'Job updated successfully');
        return redirect()->back();
    }

    public function job_accept(Request $request) {
        $user = User::find($request->uid);
        Apply::where([['jid', '=', $request->jid], ['uid', '=', $request->uid]])->update(['status' => $request->status]);
        // Send mail
        // Mail::to($user->mail)->send(new SendAcceptResume($user->name));
        $filePath = public_path($request->cv);
        $job = Job::find($request->jid);
        $employer = $job->employer;
        if ($request->status == '2') {
            Mail::to("daokhanhduycm@gmail.com")->send(new EmployerAcceptResume($user->name, $employer->name, $job->name, $filePath));
        } else {
            Mail::to("daokhanhduycm@gmail.com")->send(new EmployerDeninedResume($user->name, $employer->name, $job->name, $filePath));
        }
         
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
        $job = Job::find($request->jid);
        $employer = $job->employer;
        // $apply->job()->create(Job::find($request->jid));
        // $apply->user()->create(auth()->user()->user);

        //$employer->mail
        Mail::to("daokhanhduycm@gmail.com")->send(new UserApplyResume($user->name, $employer->name, $job->name, $cv));
        $apply->save();
        return redirect()->back();
    }
}

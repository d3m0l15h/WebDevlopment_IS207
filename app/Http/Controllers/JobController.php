<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
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
            'location' => 'required|in:HCM,HN,DN,CT,Hue',
        ]);
        $job = new Job();
        $job->name = $request->title;
        $job->descriptions = $request->description;
        $job->strength = $request->strength;
        $job->reasons = $request->reason;
        $job->requirements = $request->required;
        $job->salary = $request->salary;
        $job->location = $request->location;
        $job->worktype = $request->WorkType;
        $job->eid = auth()->user()->employer->id;
        $job->save();
        session()->flash('success', 'Job created successfully');
        return redirect()->back();
    }
    public function detail($slug)
    {
        $parts = explode('-', $slug);
        $job = Job::where('id', end($parts))->first();

        if (!$job) {
        // Handle the case where no job with the given slug exists.
        }

        $id = $job->id;
        return view('job_details', compact('job'));
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
            Log::info($applies);
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
        $status = $request->status;
        if ($request->statusdenied != null) {

        }

        Apply::where([['jid', '=', $request->jid], ['uid', '=', $request->uid]])->update(['status' => $request->status]);
        return redirect()->back();
    }

    public function upload_cv(Request $request) {
        // if (auth()->user() == null || auth()->user()->user == null ) {
        //     return abort(404);
        // }
        
        $user_id = auth()->user()->user->id;
        // $job_detail = Job::where('id', '=', $request->jid)->get()[0];

        $apply = Apply::create([
            'jid' => (int)$request->jid,
            'uid' => (int)$user_id,
            'cv' => '',
            'letter' => $request->letter
        ]);
        // $apply->job()->create(Job::find($request->jid));
        // $apply->user()->create(auth()->user()->user);
        $apply->save();

        return redirect()->back();
    }
}

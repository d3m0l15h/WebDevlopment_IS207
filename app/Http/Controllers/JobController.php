<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;

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
        $applies = Apply::all();
        return view('admin_request', compact('applies'));
    }

    public function upload_cv(Request $request) {
        // if (auth()->user() == null || auth()->user()->user == null ) {
        //     return abort(404);
        // }

        $user_id = auth()->user()->user->id;
        $job_detail = Job::where('id', '=', $request->jid)->get()[0];

        // $account = Apply::create([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'userID' => $user->id,
        // ]);

        return redirect()->back();
    }
}

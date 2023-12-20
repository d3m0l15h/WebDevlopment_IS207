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
    public function index(Request $request)
    {
        //FILTER
        $queryParams = $request->all();

        // Dump query parameters for debugging
       // dd($queryParams);

        // Start a query builder
        $query = Job::query();

        // Filter by job level
        if (isset($queryParams['btn-check'])) {
            $query->where('level', 'fresher');
        }
        if (isset($queryParams['btn-check-2'])) {
            $query->where('level', 'junior');
        }
        if (isset($queryParams['btn-check-3'])) {
            $query->where('level', 'senior');
        }
        if (isset($queryParams['btn-check-4'])) {
            $query->where('level', 'manager');
        }

        // Filter by job type
        if (isset($queryParams['btn-check-fulltime'])) {
            $query->where('worktime', 'Full-time');
        }
        if (isset($queryParams['btn-check-parttime'])) {
            $query->where('worktime', 'Part-time');
        }

        // Filter by job location
        if (isset($queryParams['btn-check-remote'])) {
            $query->where('worktype', 'remote');
        }
        if (isset($queryParams['btn-check-office'])) {
            $query->where('worktype', 'company');
        }
        if (isset($queryParams['btn-check-flex'])) {
            $query->where('worktype', 'hybrid');
        }

        //SEARCH
        $search = request('search');
        $location = request('location');

        if ($search && $location) {
            $jobs = Job::whereHas('employer', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->where('location', 'like', '%' . $location . '%')
                ->where('status', '=', '1')
                ->paginate(20);

            if ($jobs->isEmpty()) {
                $jobs = Job::where('name', 'like', '%' . $search . '%')
                    ->where('location', 'like', '%' . $location . '%')
                    ->where('status', '=', '1')
                    ->paginate(20);
            }
        } elseif ($search) {
            $jobs = Job::whereHas('employer', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
                ->where('status', '=', '1')
                ->paginate(20);

            if ($jobs->isEmpty()) {
                $jobs = Job::where('name', 'like', '%' . $search . '%')
                    ->where('status', '=', '1')
                    ->paginate(20);
            }
        } elseif ($location) {
            $jobs = Job::where('location', 'like', '%' . $location . '%')
                ->where('status', '=', '1')
                ->paginate(20);
        } else {
            $jobs = $query->where('status', '=', '1')->paginate(20);
        }

        return view('job.index', compact('jobs'));
    }
    public function show($slug) //job details
    {
        $parts = explode('-', $slug);
        $jobid = end($parts);
        $job = Job::where('id', $jobid)->first();
        $applied = null;

        if (Auth::check() && auth()->user()->role == 'user') {
            $result = Apply::where([['jid', '=', $jobid], ['uid', '=', auth()->user()->user->id]])->get();
            if (sizeof($result) != 0) {
                $applied = $result[0];
            }
        }

        if (!$job) {
            // Handle the case where no job with the given slug exists.
        }
        return view('job.detail', compact('job', 'applied'));
    }
    public function create()
    {
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
            'salarymax' => 'required|numeric|gt:salarymin',
        ], [
            'title.required' => 'Tên công việc không được để trống.',
            'description.required' => 'Mô tả công việc không được để trống.',
            'strength.required' => 'Điểm mạnh không được để trống.',
            'reason.required' => 'Lí do không được để trống.',
            'required.required' => 'Yêu cầu không được để trống.',
            'location.required' => 'Địa điểm không được để trống.',
        ]);
        $job = new Job();
        $job->name = $request->title;
        $job->descriptions = $request->description;
        $job->strength = $request->strength;
        $job->reasons = $request->reason;
        $job->requirements = $request->required;
        $job->salary = $request->salary;
        $job->salarymin = (float) $request->salarymin;
        $job->salarymax = (float) $request->salarymax;
        $job->location = $request->location;
        $job->worktype = $request->worktype;
        $job->worktime = $request->worktime;
        $job->level = $request->level;
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
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'strength' => 'required',
            'reason' => 'required',
            'required' => 'required',
            'location' => 'required|in:HCM,HN,DN,CT,Hue',
            'salarymax' => 'gt:salarymin',
        ], [
            'title.required' => 'Tên công việc không được để trống.',
            'description.required' => 'Mô tả công việc không được để trống.',
            'strength.required' => 'Điểm mạnh không được để trống.',
            'reason.required' => 'Lí do không được để trống.',
            'required.required' => 'Yêu cầu không được để trống.',
            'location.required' => 'Địa điểm không được để trống.',
        ]);
        $job = Job::find($request->id);
        $job->name = $request->title;
        $job->descriptions = $request->description;
        $job->strength = $request->strength;
        $job->reasons = $request->reason;
        $job->requirements = $request->required;
        $job->salary = $request->salary;
        $job->salarymin = (float) $request->salarymin;
        $job->salarymax = (float) $request->salarymax;
        $job->location = $request->location;
        $job->worktype = $request->worktype;
        $job->worktime = $request->worktime;
        $job->level = $request->level;
        $job->save();
        session()->flash('success', 'Job updated successfully');
        return redirect()->back();
    }

    public function upload_cv(Request $request)
    {
        $user = auth()->user()->user;
        $cv = '';

        if ($request->cvfile != null) {
            $cvfile = $request->file('cvfile');
            $ext = $cvfile->extension();
            $final_name = date("YmdHis") . $user->name . "." . $ext;
            $cvfile->storeAs('/assets/img/resume/', $final_name, ['disk' => 'public_uploads']);
            $cv = "assets/img/resume/" . $final_name;
        }

        $apply = Apply::create([
            'jid' => (int) $request->jid,
            'uid' => (int) $user->id,
            'cv' => $cv,
            'letter' => $request->letter
        ]);
        $job = Job::find($request->jid);
        $employer = $job->employer;
        // $apply->job()->create(Job::find($request->jid));
        // $apply->user()->create(auth()->user()->user);

        //$employer->mail
        Mail::to("davicmax123@gmail.com")->send(new UserApplyResume($user->name, $employer->name, $job->name, $cv));
        $apply->save();
        return redirect()->back();
    }
}

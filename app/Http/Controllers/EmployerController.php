<?php

namespace App\Http\Controllers;

use App\Mail\EmployerAcceptResume;
use App\Mail\EmployerDeninedResume;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Log;

class EmployerController extends Controller
{
    //[GET] /employer/manage_jobs
    public function manage_jobs(Request $request)
    {

        $employer_id = auth()->user()->employer->id;
        $jobs = Job::where('eid', '=', $employer_id)->get();

        if ($request->has('search')) {
            $search = $request->get('search');
            $jobs = Job::where('name', 'like', '%' . $search . '%')
                ->where('eid', '=', $employer_id)
                ->get();
        } else {
            $jobs = Job::where('eid', '=', $employer_id)->get();
        }

        return view('employer.job_management', ['jobs' => $jobs]);
    }
    //[GET]
    public function manage_status_toggle($id)
    {
        $job = Job::find($id);
        $job->status = $job->status == '0' ? '1' : '0';
        $job->save();
        return redirect()->back();
    }

    //[GET] /employer/apply_management
    public function manage_applies(Request $request)
    {
        $employer_id = auth()->user()->employer->id;
        if ($employer_id == null)
            return abort(404);
        $jobs = Job::where('eid', '=', $employer_id)->get();
        $applies = [];
        if ($request->has('search')) {
            if (!empty($jobs)) {
                $search = urldecode($request->get('search'));
                $job_ids = Job::where('eid', $employer_id)->pluck('id');
                $applies = Apply::join('users', 'applies.uid', '=', 'users.id')
                    ->whereIn('jid', $job_ids)
                    ->where(function ($query) use ($search) {
                        $query->where('users.name', 'like', '%' . $search . '%')
                            ->orWhere('users.email', 'like', '%' . $search . '%');
                    })
                    ->where('applies.status', '=', '1')
                    ->select('applies.*') // to avoid column name conflict
                    ->get();
            }
        } else {
            if (!empty($jobs)) {
                $job_ids = Job::where('eid', $employer_id)->pluck('id');
                $applies = Apply::whereIn('jid', $job_ids)
                                ->where('applies.status', '=', '1')
                                ->get();
                //Log::info($applies);
            }
        }


        return view('employer.apply_management', compact('applies'));
    }

    //[POST]
    public function job_accept(Request $request)
    {
        $user = User::find($request->uid);
        Apply::where([['jid', '=', $request->jid], ['uid', '=', $request->uid]])->update(['status' => $request->status]);
        // Send mail
        // Mail::to($user->mail)->send(new SendAcceptResume($user->name));
        $filePath = public_path($request->cv);
        $job = Job::find($request->jid);
        $employer = $job->employer;
        if ($request->status == '2') {
            Mail::to($user->accounts->email)->send(new EmployerAcceptResume($user->name, $employer->name, $job->name, $filePath));
        } else {
            Mail::to($user->accounts->email)->send(new EmployerDeninedResume($user->name, $employer->name, $job->name, $filePath));
        }

        return redirect()->back();
    }
}

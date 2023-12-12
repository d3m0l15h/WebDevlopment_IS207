<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Log;

class EmployerController extends Controller
{
    //
    public function manage_job_applies() {
        if (!Auth::check()) {
            return abort(404);
        }

        $employer = auth()->user()->employer;
        // Log::info($employer->id);
        $jobs = Job::where('eid', '=', $employer->id)->get() ;
        $applies = Apply::all();
        return view('job_management', compact('applies', 'jobs'));
    }
}

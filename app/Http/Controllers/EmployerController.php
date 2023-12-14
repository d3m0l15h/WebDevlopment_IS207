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
    public function manage_jobs() {
        if (!Auth::check()) {
            return abort(404);
        }
        if(auth()->user()->role == 'user') {
            return abort(404);
        }
        $employer_id = auth()->user()->employer->id;
        $jobs = Job::where('eid', '=', $employer_id)->get() ;
        $applies = Apply::all();
        return view('job_management', compact('applies', 'jobs'));
    }
}

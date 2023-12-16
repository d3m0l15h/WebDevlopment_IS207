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
    public function manage_jobs(Request $request) {
        if(!Auth::check()) {
            return abort(404);
        }
        if(auth()->user()->role != 'employer') {
            return abort(404);
        }

        $employer_id = auth()->user()->employer->id;
        $jobs = Job::where('eid', '=', $employer_id)->get() ;
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $jobs = Job::where('name', 'like', '%' . $search . '%')
                        ->where('eid', '=', $employer_id)
                        ->get();
        } else {
            $jobs = Job::where('eid', '=', $employer_id)->get() ;
        }
    
        return view('employer.job_management', ['jobs' => $jobs]);
    }
}

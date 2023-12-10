<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index()
    {
        // if(!Auth::check()) return abort(404);
        // if(auth()->user()->role == 'user') return abort(404);
        return view('create_job');
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'strength' => 'required',
            'reason' => 'required',
            'required' => 'required',
            'salary' => 'required',
            'location' => 'required',
        ]);
        return redirect()->back();
    }

    public function manage_user_jobs() {
        $jobs = Job::all();
        return view('my_jobs', compact('jobs'));
    }
}

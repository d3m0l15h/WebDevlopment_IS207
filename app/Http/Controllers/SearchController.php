<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Log;

class SearchController extends Controller
{
    //
    

    public function show($id) {
        $job_details = Job::where('id', '=', $id);
        return view('job.detail', compact('job_details'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Log;

class SearchController extends Controller
{
    //
    public function search() {
        $search_job = request('search');
        // Log::info(request("location"));
        if ($search_job) {
            $jobs = Job::where('name', 'like', '%' . $search_job . '%')->get();
        } else {
            $jobs = Job::paginate(20);
        }
        return view('search', compact('jobs'));
    }

    public function job_details($id) {
        $job_details = Job::where('id', '=', $id);
        return view('job.detail', compact('job_details'));
    }
}

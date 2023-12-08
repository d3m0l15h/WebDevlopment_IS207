<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Log;

class SearchController extends Controller
{
    //
    public function search() {
        $jobs = Job::all();
        Log::info($jobs);
        return view('search', compact('jobs'));
    }
}

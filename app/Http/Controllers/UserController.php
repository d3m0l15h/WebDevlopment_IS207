<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function applied()
    {
        $jobs = Job::all();
        return view('user.applied', compact('jobs'));
    }
}

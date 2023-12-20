<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $users = User::count();
        $emps = Employer::count();
        $jobs = Job::count();
        return view('home.index',['users' => $users, 'emps' => $emps , 'jobs' => $jobs]);
    }
}

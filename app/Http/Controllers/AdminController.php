<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $userCount = User::count();
        $empCount = Employer::count();
        $jobCount = Job::count();


        return view('admin')->with([
            'userCount' => $userCount, 
            'empCount' => $empCount,
            'jobCount' => $jobCount
        ]);
    }

    public function userManagement(){
        $users = User::all();
        return view('admin_user_manage')->with([
            'users' => $users
        ]);
    }

    public function empManagement(){
        $emps =Employer::all();
        return view('admin_employer_manage')->with([
            'emps' => $emps
        ]);
    }

    public function viewUser($id) {
        $user = User::find($id);
        return view('admin_view_user')->with([
            'user' => $user
        ]);
    }

    public function viewEmp($id) {
        $emp = Employer::find($id);
        return view('admin_view_employer')->with([
            'emp' => $emp
        ]);
    }
}

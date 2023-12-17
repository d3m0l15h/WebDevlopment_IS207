<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use Log;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function manage_request() {
        $employers = Employer::where('status', '=', '3')->get();
        return view('admin.request_manage', compact('employers'));
    }

    public function request_become_employer(Request $request) {
        Employer::find($request->eid)->update(['status' => '1']);
        return redirect()->back();
    }
    
    public function dashboard(){
        $userCount = User::count();
        $empCount = Employer::count();
        $jobCount = Job::count();


        return view('admin.index')->with([
            'userCount' => $userCount, 
            'empCount' => $empCount,
            'jobCount' => $jobCount
        ]);
    }

    public function manage_user(){
        $users = User::all();
        return view('admin.user_manage')->with([
            'users' => $users
        ]);
    }

    public function manage_employer(){
        $emps =Employer::all();
        return view('admin.employ_manage')->with([
            'emps' => $emps
        ]);
    }

    public function user_show($id) {
        $user = User::find($id);
        return view('admin_view_user')->with([
            'user' => $user
        ]);
    }
}

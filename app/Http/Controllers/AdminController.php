<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){

        if(!Auth::check()) return abort(404);
        if(auth()->user()->role != 'admin') return abort(404);


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
        if(!Auth::check()) return abort(404);
        if(auth()->user()->role != 'admin') return abort(404);
        $users = User::all();
        return view('admin_user_manage')->with([
            'users' => $users
        ]);
    }

    public function empManagement(){
        if(!Auth::check()) return abort(404);
        if(auth()->user()->role != 'admin') return abort(404);
        $emps =Employer::all();
        return view('admin_employer_manage')->with([
            'emps' => $emps
        ]);
    }

    public function viewUser($id) {
        if(!Auth::check()) return abort(404);
        if(auth()->user()->role != 'admin') return abort(404);
        $user = User::find($id);
        return view('admin_view_user')->with([
            'user' => $user
        ]);
    }

    public function viewEmp($id) {
        if(!Auth::check()) return abort(404);
        if(auth()->user()->role != 'admin') return abort(404);
        $emp = Employer::find($id);
        return view('admin_view_employer')->with([
            'emp' => $emp
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use Log;

class AdminController extends Controller
{
    //
    public function manage_user() {
        $search_user = request('search');
        if ($search_user) {
            $users = User::where('name', 'like', '%' . $search_user . '%')->get();
        } else {
            $users = User::all();
        }
        return view('admin.user_manage', compact('users'));
    }

    
    public function manage_employer() {
        $search_employer = request('search');
        if ($search_employer) {
            $employers = Employer::where('name', 'like', '%' . $search_employer . '%')->get();
        } else {
            $employers = Employer::all();
        }
        return view('admin.employ_manage', compact('employers'));
    }

    public function dashboard() {
        return view('admin.index');
    }
}

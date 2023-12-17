<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log as FacadesLog;

class AdminController extends Controller
{
    public function manage_request(Request $request)
    {
        if($request->has('search')){
            $search = urldecode($request->get('search'));
            
            $employers = Employer::join('accounts', 'accounts.employerid', '=', 'employers.id')
            ->where('accounts.username', 'like', '%'.$search.'%')
            ->orWhere('accounts.email', 'like', '%'.$search.'%')
            ->where('employers.status', '=', '3')
            ->select('employers.*')
            ->get();
        }else{
            $employers = Employer::where('status', '=', '3')->get();
        }
        return view('admin.request_manage', compact('employers'));
    }

    public function request_become_employer(Request $request)
    {
        Employer::find($request->eid)->update(['status' => '1']);
        return redirect()->back();
    }

    public function dashboard()
    {
        $userCount = User::count();
        $empCount = Employer::where('status', '!=', '3')->count();
        $jobCount = Job::count();


        return view('admin.index')->with([
            'userCount' => $userCount,
            'empCount' => $empCount,
            'jobCount' => $jobCount
        ]);
    }

    public function manage_user(Request $request)
    {
        if ($request->has('search')) {
            $search = urldecode($request->get('search'));
            FacadesLog::info($search);
            $users = User::join('accounts', 'accounts.userid', '=', 'users.id')
                ->where('accounts.username', 'like', '%' . $search . '%')
                ->orWhere('accounts.email', 'like', '%' . $search . '%')
                ->select('users.*')
                ->get();
        } else {
            $users = User::all();
        }
        return view('admin.user_manage')->with([
            'users' => $users
        ]);
    }
    public function user_status($id)
    {
        $user = User::find($id);
        $user->status = $user->status == '0' ? '1' : '0';
        $user->save();
        return redirect()->back();
    }

    public function manage_employer(Request $request)
    {
        if ($request->has('search')) {
            $search = urldecode($request->get('search'));
            $emps = Employer::join('accounts', 'accounts.employerid', '=', 'employers.id')
                ->where('accounts.username', 'like', '%' . $search . '%')
                ->orWhere('accounts.email', 'like', '%' . $search . '%')
                ->where('employers.status', '!=', '3')
                ->select('employers.*')
                ->get();
        } else {
            $emps = Employer::where('status', '!=', '3')->get();
        }
        return view('admin.employer_manage')->with([
            'emps' => $emps
        ]);
    }
    public function employer_status($id)
    {
        $employer = Employer::find($id);
        $employer->status = $employer->status == '0' ? '1' : '0';
        $employer->save();
        return redirect()->back();
    }

    public function user_show($id)
    {
        $user = User::find($id);
        $email = $user->accounts->first()->email;
        return view('admin.user_show')->with([
            'user' => $user,
            'email' => $email
        ]);
    }
}

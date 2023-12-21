<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMailable;
use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $users = User::count();
        $emps = Employer::count();
        $jobs = Job::count();
        return view('home.index',['users' => $users, 'emps' => $emps , 'jobs' => $jobs]);
    }
    public function contact(Request $request){
        Mail::to("davicmax123@gmail.com")->send(new ContactFormMailable($request->email, $request->subject, $request->name, $request->content));
        return redirect()->route('home');
    }
}

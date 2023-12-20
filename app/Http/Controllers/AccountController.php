<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|unique:accounts',
            'email' => 'required|email|unique:accounts',
            'password' => 'required|confirmed',
            'terms' => 'accepted',
        ], [
            'username.required' => 'The username field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'terms.accepted' => 'You must accept the terms and conditions.',
        ]);

        // Create a new user and save it to the database
        $user = User::create([
                'email' => $request->email
        ]);
        $account = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'userid' => $user->id,
        ]);

        // Log the user in
        auth()->login($account);
        session()->flash('success', 'Registration successful!');
        return redirect()->back();
    }
    public function employer(Request $request)
    {
        session()->flash('employerFormSubmitted', true);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:accounts',
            'location' => 'required',
            'username' => 'required|unique:accounts',
            'password' => 'required',

        ], [
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone field is required.',
            'location.required' => 'The location field is required.',
            'username.required' => 'The username field is required.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.'
        ]);

        $employer = Employer::create([
            'phone' => $request->phone,
            'name' => $request->name,
            'email' => $request->email,
            'location' => $request->location,
            'status' => '3' // status la 3 (Cho Admin Accept)
        ]);

        $account = Account::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'employer',
            'employerid' => $employer->id,
        ]);
        return redirect()->back();
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $email = $request->email;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $account = Account::where('email', $request->email)->first();
        } else {
            $account = Account::where('username', $request->email)->first();
        }

        if ($account && Hash::check($request->password, $account->password)) {
            if ($account->role == 'employer' && $account->employer->status == '3') {
                // Employer chua dc accept boi admin
                session()->flash('fail', 'Employer haven"t actived yet. Please contact admin for more details');
                return redirect()->back();
            }
            if($account->role == 'employer' && $account->employer->status == '0') {
                // Employer bi khoa
                session()->flash('fail', 'You have been locked. Please contact admin for more details');
                return redirect()->back();
            }
            if($account->role == 'user' && $account->user->status == '0') {
                // User bi khoa
                session()->flash('fail', 'You have been locked. Please contact admin for more details');
                return redirect()->back();
            }
            Auth::login($account);
            session()->flash('success', 'Login Success');
            return redirect()->back();
        }
        session()->flash('fail', 'Wrong email or password');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
?>
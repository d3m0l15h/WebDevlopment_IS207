<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return abort(404);
        }
        
        $email = auth()->user()->email;
        if (auth()->user()->role == 'employer') {
            $userProfile = auth()->user()->employer;
            return view('profile.employer', ['userProfile' => $userProfile, 'email' => $email]);
        }
    
        $userProfile = auth()->user()->user;
        return view('profile.user', ['userProfile' => $userProfile, 'email' => $email]);
    }
    public function employer(Request $request)
    {
        $employerID = auth()->user()->employer->id;
        $employer = Employer::find($employerID);

        $employer->location = $request->location;
        $employer->workingtime = $request->workingTime;
        $employer->introduce = $request->introduce;
        $employer->ownproject = $request->ownProject;
        $employer->prize = $request->prize;

        if ($request->avatar != null) {
            $avatar = $request->file('avatar');
            $ext = $avatar->extension();
            $final_name = date("YmdHis").$employer->name.".".$ext;
            $avatar->storeAs('/assets/img/avatar/', $final_name,['disk' => 'public_uploads']);
            $employer->logo = "assets/img/avatar/".$final_name;
        }

        $employer->save();
        session()->flash('success', 'Cập nhật thông tin thành công');
        return redirect()->route('profile');
    }

    public function user(Request $request)
    {
        $userID = auth()->user()->user->id;
        $user = User::find($userID);

        $user->name = $request->name;
        $user->introduce = $request->introduce;
        $user->education = $request->education;
        $user->experience = $request->experience;
        $user->skill = $request->skill;
        $user->ownproject = $request->ownProject;
        $user->certificate = $request->certificate;
        $user->prize = $request->prize;
        $user->location = $request->location;

        if ($request->avatar != null) {
            $avatar = $request->file('avatar');
            $ext = $avatar->extension();
            $final_name = date("YmdHis").$user->name.".".$ext;
            $avatar->storeAs('/assets/img/avatar/', $final_name,['disk' => 'public_uploads']);
            $user->avatar = "assets/img/avatar/".$final_name;
        }

        $user->save();
        session()->flash('success', 'Cập nhật thông tin thành công');
        return redirect()->route('profile');
    }
}

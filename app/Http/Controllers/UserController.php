<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function applied()
    {
        $experience = auth()->user()->user->experience;
        $applies = Apply::where('uid', '=', auth()->user()->user->id)->get();
        
        return view('user.applied', ['experience' => $experience, 'applies' => $applies]);
    }
}

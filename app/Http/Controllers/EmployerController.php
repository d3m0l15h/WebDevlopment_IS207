<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Apply;
use Log;

class EmployerController extends Controller
{
    //
    public function manage_employee_applies() {
        $applies = Apply::all();
        return view('employ_management', compact('applies'));
    }
}

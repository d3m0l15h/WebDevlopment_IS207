<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Employer;
use App\Models\User;
use App\Models\Apply;
use Illuminate\Support\Facades\Auth;
use Log;

class EmployerController extends Controller
{
    //
    public function manage_jobs(Request $request) {
        if(!Auth::check()) {
            return abort(404);
        }
        if(auth()->user()->role != 'employer') {
            return abort(404);
        }

        $employer_id = auth()->user()->employer->id;
        $jobs = Job::where('eid', '=', $employer_id)->get() ;
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $jobs = Job::where('name', 'like', '%' . $search . '%')
                        ->where('eid', '=', $employer_id)
                        ->get();
        } else {
            $jobs = Job::where('eid', '=', $employer_id)->get() ;
        }
    
        return view('employer.job_management', ['jobs' => $jobs]);
    }

    public function manage_applies() {
        $employer_id = auth()->user()->employer->id;
        if($employer_id == null)
            return abort(404);
        $jobs = Job::where('eid', '=', $employer_id)->get();
        $applies = [];

        if (!empty($jobs)) {
            $job_ids = $jobs->map(fn($item): int => $item->id);
            $applies = Apply::whereIn('jid', $job_ids)->get();
            //Log::info($applies);
        }
        $mapping_status = function($str) { return $this->mapping_status($str); };
        return view('employer.apply_management', compact('applies', 'mapping_status'));
    }

    private function mapping_status($status) {
        if ($status == '2') {
            return 'Đã Trúng Tuyển';
        }

        if ($status == '3') {
            return 'Đã Từ Chối';
        }

        if ($status == '1') {
            return 'Chờ Xác Nhận';
        }
    }
}

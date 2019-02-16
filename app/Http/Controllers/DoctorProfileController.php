<?php

namespace App\Http\Controllers;

use App\doctor_info;
use App\userprofile;
use Illuminate\Support\Facades\Auth;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class DoctorProfileController extends Controller
{

    public function __construct()
    {

    }

    public function profile(){

       $data = doctor_info::Where('user_id', '=', Auth::id())->first();

        // Viewed Doctor Profile
        $activity = ActivityLogger::activity("Viewed Doctor Profile");

        return view('doctor.doctorprofile', compact('data'))->with('activity', $activity);

        //POGI GER
    }


}

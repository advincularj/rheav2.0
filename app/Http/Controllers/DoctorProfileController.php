<?php

namespace App\Http\Controllers;

use App\doctor_info;
use App\userprofile;
use Illuminate\Support\Facades\Auth;

class DoctorProfileController extends Controller
{

    public function __construct()
    {

    }

    public function profile(){

       $data = doctor_info::Where('user_id', '=', Auth::id())->first();

        return view('doctor.doctorprofile', compact('data'));

        //POGI GER


    }


}

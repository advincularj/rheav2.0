<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.dashboard');
    }

    public function dashboard(){
        $title = 'Dashboard';

        //

        return view('doctor.dashboard')->with('title', $title);
    }

}

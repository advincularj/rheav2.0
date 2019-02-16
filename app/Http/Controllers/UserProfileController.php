<?php

namespace App\Http\Controllers;

use App\User;
use App\userprofile;
use Illuminate\Support\Facades\Auth;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class UserProfileController extends Controller
{
    public function __construct()
    {
    }
    public function userprofile(){

        $data = userprofile::Where('user_id', '=', Auth::id())->first();

        //Viewed User Profile
        $activity = ActivityLogger::activity("Viewed User Profile");

        return view('patient.userprofile', compact('data'))->with('activity', $activity);
    }

}

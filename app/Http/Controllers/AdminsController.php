<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class AdminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard(){
        $title = 'Dashboard';

        //Viewed Dashboard
        $activity = ActivityLogger::activity("Viewed Dashboard");

        return view('admin.dashboard')->with('title', $title)->with('activity', $activity);
    }

    public function profile(){
        $title = 'Profile';

        //Viewed Dashboard
        $activity = ActivityLogger::activity("Viewed Profile");

        return view('admin.profile')->with('title', $title)->with('activity', $activity);
    }

    public function tables(){
        $title = 'Users';

        //Viewed Users
        $activity = ActivityLogger::activity("Viewed Users");

        return view('admin.tables')->with('title', $title)->with('activity', $activity);
    }
}

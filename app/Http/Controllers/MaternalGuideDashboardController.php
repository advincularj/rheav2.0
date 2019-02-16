<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaternalGuide;
Use App\User;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;


class MaternalGuideDashboardController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
//        $user_id = auth()->user()->id;
//        $user = User::find($user_id);
//        return view('admin.guide')->with('guides',$user->guides);
        $activity = ActivityLogger::activity("Viewed Maternal Guide");

        $guides = MaternalGuide::orderBy('created_at', 'dsc')->paginate(6);
        return view('patient.maternalguide')->with('guides', $guides)->with('activity', $activity);
    }
}

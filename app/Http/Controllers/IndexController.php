<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class IndexController extends Controller
{
    public function index(){
        $title = 'Welcome to Rhea!';

        //Viewed Doctor's Index
        $activity = ActivityLogger::activity("Viewed Doctor's Index");

        //return view('pages.index', compact('title'));
        return view('doctor.index')->with('title',$title)->with('activity', $activity);
    }

    public function indexLoggedIn(){
        $title = 'Welcome to Rhea!';

        //Viewed Doctor's Index
        $activity = ActivityLogger::activity("Viewed patient's Index");

        //return view('pages.index', compact('title'));
        return view('pages.index_logged_in')->with('title',$title)->with('activity', $activity);
    }

    public function about(){
        $title = 'About Us';

        //Viewed About Us Page
        $activity = ActivityLogger::activity("Viewed About Us Page");

        return view('doctor.about')->with('title', $title)->with('activity', $activity);
    }

//    public function services(){
//        $title = 'Services';
//        $data = array(
//            'title' => 'Services', 'service' => ['Web Design', 'Programming', 'SEO']
//        );
//        return view('pages.services')->with($data);
//    }

    public function services(){
        $title = 'Services';

        //Viewed Services Page
        $activity = ActivityLogger::activity("Viewed Viewed Services Page");

        return view('doctor.services')->with('title', $title)->with('activity', $activity);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome to Rhea!';
        //return view('pages.index', compact('title'));

        //Viewed index
        $activity = ActivityLogger::activity("Viewed Index");

        return view('pages.index')->with('title',$title)->with('activity', $activity);
    }

    public function indexLoggedIn(){
        $title = 'Welcome to Rhea!';
        //return view('pages.index', compact('title'));

        //Viewed index
        $activity = ActivityLogger::activity("Viewed Index");

        return view('pages.index_logged_in')->with('title',$title)->with('activity', $activity);
    }

    public function about(){
        $title = 'About Us';

        //Viewed about us
        $activity = ActivityLogger::activity("Viewed About Us");

        return view('pages.about')->with('title', $title)->with('activity', $activity);
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

        //Viewed about us
        $activity = ActivityLogger::activity("Viewed Services");

        return view('pages.services')->with('title', $title)->with('activity', $activity);
    }
}

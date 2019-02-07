<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $title = 'Welcome to Rhea!';
        //return view('pages.index', compact('title'));
        return view('doctor.index')->with('title',$title);
    }

    public function about(){
        $title = 'About Us';
        return view('doctor.about')->with('title', $title);
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
        return view('doctor.services')->with('title', $title);
    }
}

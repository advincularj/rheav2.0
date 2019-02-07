<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('admin.dashboard')->with('title', $title);
    }

    public function profile(){
        $title = 'Profile';
        return view('admin.profile')->with('title', $title);
    }

    public function tables(){
        $title = 'Users';
        return view('admin.tables')->with('title', $title);
    }
}

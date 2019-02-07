<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        YT Vid 10 - 2:20
//        $user_id = auth()->user()->id;
        $user = User::find(1);
        return view('dashboard')->with('posts',$user->posts);
    }
}

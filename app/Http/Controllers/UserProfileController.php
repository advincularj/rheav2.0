<?php

namespace App\Http\Controllers;

use App\User;
use App\userprofile;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
    }
    public function userprofile(){

        $data = userprofile::Where('user_id', '=', Auth::id())->first();

        return view('patient.userprofile', compact('data'));
    }

}

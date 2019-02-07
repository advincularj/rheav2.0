<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function __construct()
    {
    }
    public function userprofile(){

        $data = userprofile::find(Auth::user()->id);
        if($data == null)
        {
            return redirect()->to('settings');
        }
        dd($data);
        return view('patient.userprofile', compact('data'));
    }

}

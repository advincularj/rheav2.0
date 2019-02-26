<?php

namespace App\Http\Controllers;

use App\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    public function index()
    {

        if (Auth::user()) {

            if (Auth::user()->role_id == 3) {
                return redirect('/userprofile');
            } elseif (Auth::user()->role_id == 1) {
                return redirect('/admin/dashboard');
            }elseif(Auth::user()->role_id == 2)
            {
                return redirect('/doctorprofile');
            } elseif(Auth::user()->role_id == 4)
            {
                return redirect('/userprofile');
            }
        } else {
            return view('auth.signin');
        }
    }
    public function store(Request $request)
    {
        $helper = new Helper();
        $valid = Validator::make($request->all(), [
            'email' => 'required|exists:users',
            'password' => 'required',
            /*'g-recaptcha-response' => 'required|captcha'*/
        ]);
        if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success &&
            $valid->passes()) {

            $attempt = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
            if ($attempt) {
                $user = Auth::user();
                session(['user' => $user]);
                session(['role' => $user->role_id]);

                if (Auth::user()->role_id == 3) {
                    return redirect('/userprofile');
                } elseif (Auth::user()->role_id == 1) {
                    return redirect('/admin/dashboard');
                }elseif(Auth::user()->role_id == 2)
                {
                    return redirect('/doctorprofile');
                } else if (Auth::user()->role_id == 4) {
                    return redirect('/userprofile');
                }


            } else {
                return redirect('/signin');
            }
        } else {
            return redirect('/signin')->withErrors($valid);
        }
    }

    public
    function logout()
    {
        Session::flush();
        session()->flush();
        Auth::logout();
        return redirect('/index');

    }
}


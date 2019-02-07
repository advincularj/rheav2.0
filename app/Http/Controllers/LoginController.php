<?php

namespace App\Http\Controllers;

use App\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {

        if (Auth::user() && session('user')) {
            if (Auth::user()->role_id == 3) {
                return redirect('/settings');
            } elseif (Auth::user()->role_id == 1) {
                return redirect('/admin/dashboard');
            }elseif(Auth::user()->role_id == 2)
            {
                return redirect('addpatient');
            }
        } else {
            return view('auth.login');
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
                    return redirect('/settings');
                } elseif (Auth::user()->role_id == 1) {
                    return redirect('/admin/dashboard');
                }elseif(Auth::user()->role_id == 2)
                {
                    return redirect('addpatient');
                }


            } else {
                return redirect('/login');
            }
        } else {
            return redirect('/login')->withErrors($valid);
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


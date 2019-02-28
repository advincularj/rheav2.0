<?php

namespace App\Http\Controllers;

use App\Helper;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SigninController extends Controller
{
    use AuthenticatesUsers;

    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->role_id == 3) {
                return redirect('/index');
            } elseif (Auth::user()->role_id == 1) {
                return redirect('/admin/dashboard');
            }elseif(Auth::user()->role_id == 2)
            {
                return redirect('/doctorprofile');
            } elseif(Auth::user()->role_id == 4)
            {
                return redirect('/index');
            }
        } else {
            return view('auth.signin');
        }
    }

    public function store(Request $request)
    {
        $helper = new Helper();
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|exists:users',
            'password' => 'required|max:64',
            'g-recaptcha-response' => 'required'
        ], [
//            'email' => 'blah',
//            'password' => 'blah',
            'g-recaptcha-response.required' => 'Please check the recaptcha box before logging in.'
        ]);
        if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success &&
            $validator->passes()) {
            $attempt = Auth::attempt(['email' => $request['email'], 'password' => $request['password']]);
            if ($attempt) {
                $user = Auth::user();
                session(['user' => $user]);
                session(['role' => $user->role_id]);
                if (Auth::user()->role_id == 3) {
                    return redirect('/index')->with("success", "Login Success!");;
                } elseif (Auth::user()->role_id == 1) {
                    return redirect('/admin/charts')->with("success", "Login Success!");;
                }elseif(Auth::user()->role_id == 2)
                {
                    return redirect('/doctorprofile')->with("success", "Login Success!");;
                } elseif(Auth::user()->role_id == 4)
                {
                    return redirect('/index')->with("success", "Login Success!");;
                }
            } else {
                return redirect()->back()->with("error", "Please try again.");
            }
        } else {
            return back()->with("error", "Please try again.");
        }
    }
    public function logout()
    {
//        Session::flush();
//        session()->flush();
//        Auth::logout();
//        return redirect('/index');
        $this->guard()->logout();
        Auth::logout();
        return redirect('signin');

    }
}




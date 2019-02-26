<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

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

//    public function __construct()
//    {
//        $this->middleware('guest')->except('logout');
//    }
}

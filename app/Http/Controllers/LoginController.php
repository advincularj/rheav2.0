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
                return redirect('/log-in');
            }
        } else {
            return redirect('/log-in')->withErrors($valid);
        }
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        // Customization: Validate if client status is active (1)
        $email = $request->get($this->username());
        // Customization: It's assumed that email field should be an unique field
        $users = Users::where($this->username(), $email)->first();
        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);
        // Customization: If client status is inactive (0) return failed_status error.
        if ($users->status === 0) {
            return $this->sendFailedLoginResponse($request, 'auth.failed_status');
        }
        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        // Customization: validate if client status is active (1)
        $credentials['status'] = 1;
        return $credentials;
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


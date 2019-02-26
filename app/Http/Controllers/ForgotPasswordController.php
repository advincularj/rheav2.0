<?php

namespace App\Http\Controllers;

use App\Helper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PHPMailer\PHPMailer\PHPMailer;


class ForgotPasswordController extends Controller
{

    public function create()
    {
        return view('auth.passwords.email');
    }
    public function store(Request $request)
    {
        $emailAddress = $request['email'];
        $salt = 'salted';
        $check = User::all()->where('email', '=', $emailAddress)->first();
        if ($check != null) {
            $password = $check->password;
            $emailcode = bcrypt($check->password . $salt);
            $check->emailcode = $emailcode;
            $check->save();
            $link = url('forgotpassword') . "?key=" . $emailcode . "&time=" . Carbon::now() . "";
            $body = '<html>
        <body>
        <h1>Password Reset</h1>
        <hr />
        <h3>Hello!</h3>
        <p>You are receiving this email because we received a password reset request for your account. This password reset link will expire in 24 hours.</p>
        <p>&nbsp;</p>
        <a href="' . $link . '">Reset Link</a>
        <p>If you did not request a password reset, no further action is required.</p>
        <p>Regards,&nbsp;<br />RHEA Team</p>
        <p>&nbsp;</p>
        <hr />
        </body>
        </html>';
            $helper = new helper();
            $result = $helper->emailSend($request['email'], $body, 'Forgot password');
            if ($result == false) {
                \alert()->success('Email Sent!', 'You have successfully sent an Email!');
                return redirect()->back()->withErrors($result->ErrorInfo);
            } else {
                return back()->with('success', 'You have successfully sent an Email!');
            }
        } else {
            return redirect('/forgotpassword')->with('success', 'You have successfully sent an Email!');
        }
    }
    public function getKeys(Request $request)
    {
        if ($request->exists('time') == true) {
            $time1 = $request->query('time');
            $key = $request['key'];
            $user = User::where('emailcode', $key)->first();
            if ($user != null) {
                $email = $user->email;
                $carbontime = Carbon::parse($time1);
                $minutespassed = $carbontime->diffInMinutes(Carbon::now());
                if ($minutespassed <= 35) {
                    return view('auth.passwords.reset', compact('email'));
                } else {
                    \alert()->error('Whoops!', 'The Link has expired! Please try again.');
                    return redirect('/signin');
                }
            }else{
                alert()->error('Whoops!', 'Your link has Expired');
                return redirect('/signin');
            }
        } else {
            alert()->error('Whoops!', 'There was an error!');
            return redirect('/signin');
        }
    }
    public function saveNewPassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:6|max:64|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'password_confirmation' => 'required'
        ]);
        if ($valid->passes()) {
            $query = DB::table('users')
                ->where('email', '=', $request['emailAddress'])
                ->update(['password' => bcrypt($request['password']), 'status' => '1', 'emailcode' => '']);
            if ($query == 1) {
                return back()->with('success', 'Your password has been saved!');
            } else {
                return back()->with('error!!', 'Something went wrong');
            }
        } else {
            return back()->withErrors($valid);
        }
    }
}

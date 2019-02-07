<?php

namespace App\Http\Controllers;

use App\userprofile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Helper;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        if (Auth::user() && session()->exists('user')) {
            if (Auth::user()->role_id == 3) {
                return redirect('/index');
            } elseif (Auth::user()->role_id != 3 ) {
                return redirect('/index');
            }
        } else{
            return view('auth.register');
        }
    }

    public function create()
    {
        $this->index();
    }

    public function store(Request $request)
    {
        $helper = new Helper();

        $valid = Validator::make($request->all(), [
            //'role_id' => 'required|integer',
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required','size:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],


        ]);
        if ($valid->passes()) {
            if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success) {

                $data = $request->all();
                $data['password'] = bcrypt($data['password']);
                $data['role_id'] = 3;
                User::create($data);




                return redirect('/login');
            } else {
                return redirect('/register')->withInput();
            }
        } else {
            return redirect('/register')->withErrors($valid)->withInput();
        }
        userprofile::create(['user_id' => $user->id]);
        return $user;


    }

}
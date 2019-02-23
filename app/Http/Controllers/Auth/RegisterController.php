<?php

namespace App\Http\Controllers\Auth;

use App\doctor_info;
//use App\Mail\verifyEmail;
use App\User;
use Mail;
use App\userprofile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use App\Notifications\VerifyEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function index()
    {//
    }

    public function create()
    {
        $this->index();
    }


    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/log-in';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required','size:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'g-recaptcha-response' => 'required'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(array $data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'birth_date' => $data['birth_date'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role_id' => 4,
            //'token' => str_random(25),
        ]);

        //$user->notify(new verifyEmail($user));


        userprofile::create(['user_id' => $user->id]);
        return $user;
    }

//    public function sendEmail($thisUser){
//        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
//    }
//
//    public function verifyEmailFirst(){
//        return view('email.verifyEmailFirst');
//    }
//
//    public function sendEmailDone($email,$verifyToken){
//        $user = User::where(['email' => $email, 'verifyToken' => $verifyToken])->first();
//        return $user;
//
//    }
}

<?php

namespace App\Http\Controllers;

use App\Notifications\UserRegisteredNotification;
use App\userprofile;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Helper;
use Illuminate\Support\Facades\Hash;
use Validator;
use Redirect;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;



class RegisterController extends Controller
{
    use SendsPasswordResetEmails;
    use Notifiable;

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
            'g-recaptcha-response' => 'required'


        ]);
        if ($valid->passes()) {
            if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success) {

                $data = $request->all();
                $data['password'] = bcrypt($data['password']);
                $data['role_id'] = 3;
                //$data['verification_code'] = str_random(20);

                $id = User::create($data)->id;

                userprofile::create(['user_id' => $id]);

                //User::sendConfirmationEmail($data);
                //return redirect('/register')->with('success', 'We sent you a confirmation email!');
                //$data['verification_code']  = $data->verification_code;

                //Mail::send('patient.confirmation', $data, function($message) use ($data)
                //{
                //    $message->from('rhea.isproj2@gmail.com', 'RHEA');
                //    $message->to($data->email, $data->first_name, $data->last_name)->subject('Welcome to RHEA');
                //});



                return redirect('/log-in');
            } else {
                return redirect('/register')->withErrors($valid)->withInput();
            }
        } else {
            return redirect('/register')->withErrors($valid)->withInput();
        }}

    protected function registered(Request $request, $data) {
        $data->notify(new UserRegisteredNotification($data));
    }

}
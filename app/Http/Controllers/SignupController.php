<?php

namespace App\Http\Controllers;

use App\Notifications\UserRegisteredNotification;
use App\userprofile;
use Illuminate\Foundation\Auth\RegistersUsers;
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
use Illuminate\Validation\Rule;
use App\verifyUser;


class SignupController extends Controller
{
    use SendsPasswordResetEmails;
    use Notifiable;
//    use RegistersUsers;

    public function index()
    {
        if (Auth::user() && session()->exists('user')) {
            if (Auth::user()->role_id == 4) {
                return redirect('/index');
            } elseif (Auth::user()->role_id != 4 ) {
                return redirect('/index');
            }
        } else{
            return view('auth.signup');
        }
    }

    public function create()
    {
        $this->index();
    }

    public function store(Request $request)
    {
        $helper = new Helper();

//        $unique = Rule::unique('users')->where('last_name', $this->request->get('last_name'))
//            ->where('first_name', $this->request->get('first_name'));
        $validator = Validator::make($request->all(), [
            'first_name' => ['string', 'required','max:50','regex:/^[a-z ,.\'-]+$/i'],
            'last_name' => ['string', 'required','max:50','regex:/^[a-z ,.\'-]+$/i'],
//            'birth_date' => ['required', 'date'],
            'phone' => ['required','numeric', 'digits_between:10,11','regex:/^[09]{2}[0-9]{9}$/',],
            'email' => ['required', 'string', 'email','email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6', 'max:64', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'password_confirmation' => ['required','same:password'],
            'g-recaptcha-response' => 'required'
        ], [
            'first_name.required' => 'The first name field is required.',
            'first_name.max' => 'The first name may not be greater than 50 characters.',
            'first_name.regex' => 'The first name format is invalid',

            'last_name.required' => 'The last name field is required',
            'last_name.max' => 'The last name may not be greater than 50 characters.',
            'last_name.regex' => 'The last name format is invalid',
            'last_name.unique' => 'The first name and last name has been taken.',
            'phone.regex' => 'Please Enter a Valid Mobile Number starting with 09.',
            'email.required' => 'The email address field is required.',
            'email.unique' => 'The email address is already taken.',
            'email.email' => 'The email address format is invalid.',
            'password.regex' => 'The password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 Special Character.',
            'password_confirmation.same' => 'Password must match',
            'g-recaptcha-response.required' => 'Please check the recaptcha box before creating an account.'


            ]);
        if ($validator->passes()) {
            if ($helper->reCaptchaVerify($request['g-recaptcha-response'])->success) {
                $data = $request->all();
                $data['password'] = bcrypt($data['password']);
                $data['role_id'] = 4;
                //$data['verification_code'] = str_random(20);
                $id = User::create($data)->id;
                userprofile::create(['user_id' => $id]);

//                $verifyUser = verifyUser::create([
//                    'user_id' => $data->id,
//                    'token' => str_random(40)
//                ]);
//
//                Mail::to($data->email)->send(new VerifyMail($data));


                return redirect()->back()->with("success", "Account created successfully!");
            } else {
                return redirect()->back()->with("error", "Something went wrong. ");
            }
        } else {
            return back()->withErrors($validator);
        }}

    protected function registered(Request $request, $data) {
        $data->notify(new UserRegisteredNotification($data));
    }

//    public function verifyUser($token)
//    {
//        $verifyUser = VerifyUser::where('token', $token)->first();
//        if(isset($verifyUser) ){
//            $user = $verifyUser->user;
//            if(!$user->verified) {
//                $verifyUser->user->verified = 1;
//                $verifyUser->user->save();
//                $status = "Your e-mail is verified. You can now login.";
//            }else{
//                $status = "Your e-mail is already verified. You can now login.";
//            }
//        }else{
//            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
//        }
//
//        return redirect('/login')->with('status', $status);
//    }

}
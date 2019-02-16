<?php

namespace App\Http\Controllers;

use App\doctor_info;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Validator;
use Redirect;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;


class CrudDoctorController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {

    }

    public function index()
    {
        $users = User::orderBy('created_at', 'dsc')->where('role_id', 2)->paginate(10);

        //Viewed Doctor's Table
        $activity = ActivityLogger::activity("Viewed Doctors' Table");

        return view('admin.tables')->with('users', $users)->with('activity', $activity);
    }

    protected function create()
    {
        //Viewed Create Doctor Page
        $activity = ActivityLogger::activity("Viewed Create Doctor Page");

        return view('admin.cruddoctors.create')->with('activity', $activity);

    }

    public function store(Request $request)
    {
//        $this->validate($request, [
//            'first_name' => ['required', 'string', 'max:255'],
//            'last_name' => ['required', 'string', 'max:255'],
//            'birth_date' => ['required', 'date'],
//            'phone' => ['required','size:11'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
////        ])->assignRole('doctor');
//        ]);

        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required','size:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        // If validator fails, short circut and redirect with errors
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //Generate a password for the new users
        $pw = User::generatePassword();
        //Create User (Doctor) -we can use new User because we included use App\User; here
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birth_date = $request->  input('birth_date');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $pw;
        $user['role_id'] = 2;
//        $user->password= $request->input('password');
//        $user->user_id = auth()->user()->id;
        $user->save();
        doctor_info::create(['user_id' => $user->id]);


        //Created Doctor Account
        $activity = ActivityLogger::activity("Created Doctor Account");


        User::sendWelcomeEmail($user);
        return redirect('/users')->with('success', 'Doctor Added')->with('activity', $activity);
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.cruddoctors.show')->with('user', $user);
    }


    public function edit($id)
    {
        $user = User::find($id);

        //Created Doctor Account
        $activity = ActivityLogger::activity("Viewed Edit Doctor Page");

        return view('admin.cruddoctors.edit')->with('user', $user)->with('activity', $activity);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required', 'number', 'size:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        //Create Post -we can use new 'model' because we included use App\User; here
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birth_date = $request->input('birth_date');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password= $request->input('password');
//        $user->user_id = auth()->user()->id;
        $user->save();

        //Created Doctor Account
        $activity = ActivityLogger::activity("Updated Doctor Account");

        return redirect('/users')->with('success', 'User Updated')->with('activity', $activity);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user ->delete();

        //Removed Doctor Account
        $activity = ActivityLogger::activity("Removed Doctor Page");

        return redirect('/users')->with('success','User Removed')->with('activity', $activity);
    }
}

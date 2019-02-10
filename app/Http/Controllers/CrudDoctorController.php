<?php

namespace App\Http\Controllers;

use App\doctor_info;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Validator;
use Redirect;


class CrudDoctorController extends Controller
{
    use SendsPasswordResetEmails;

    public function __construct()
    {

    }

    public function index()
    {
        $users = User::orderBy('created_at', 'dsc')->paginate(10);
        return view('admin.tables')->with('users', $users);
    }

    protected function create()
    {
        return view('admin.cruddoctors.create');

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





        User::sendWelcomeEmail($user);
        return redirect('/users')->with('success', 'Doctor Added');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.cruddoctors.show')->with('user', $user);
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.cruddoctors.edit')->with('user', $user);
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


        return redirect('/users')->with('success', 'User Updated');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user ->delete();
        return redirect('/users')->with('success','User Removed');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\userprofile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Hash;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class UserSettingsController extends Controller
{
    public function __construct()
    {

    }
    public function settings(){


        $data = userprofile::Where('user_id', '=', Auth::id())->first();
        $user  = User::find(Auth::id());

        //Viewed Settings
        $activity = ActivityLogger::activity("Viewed User Profile");

        return view('patient.settings', compact(['user', 'data']))->with('activity', $activity);
    }

    public function uploadPhoto(Request $request){



        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatar/'. $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();

            //Uploaded Photo
            $activity = ActivityLogger::activity("Uploaded Photo");

            $user = Auth::user()->id;
            DB::table('users')->where('id', $user)->update(['avatar' => $filename])->with('activity', $activity);




        }




        return redirect('settings');

    }

    /* protected function create(Request $request)
     {
         $data = $request->all();
         return doctor_info::create([
             'about' => $data['about'],
             'address' => $data['address'],
             'services' => $data['services'],
             'specialization' => $data['specialization'],
             'education' => $data['education'],
             'experience' => ($data['experience']),
         ]);
     }
 */
    public function updateProfile(Request $request) {



        User::where('id', Auth::id())->update($request['user']);
        $user_id = Auth::user()->id;


       DB::table('userprofiles')->where('user_id', $user_id)->update($request->except('_token', 'user'));
        return back();
    }

    public function showChangePasswordForm(){
        return view('patient.resetpassword');
    }

    public function changePass(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }


}

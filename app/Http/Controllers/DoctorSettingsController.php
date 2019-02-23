<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\doctor_info;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Image;
use DB;
use Hash;
use Validator;
use Illuminate\Validation\Rule;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class DoctorSettingsController extends Controller
{
    public function __construct()
    {

    }

    public function settings()
    {
        $data = doctor_info::Where('user_id', '=', Auth::id())->first();
        $user = User::find(Auth::id());

        // Viewed Doctor's Settings
        $activity = ActivityLogger::activity("Viewed Doctor's Settings");

        return view('doctor.doctorsettings', compact(['user', 'data', $data, $user]))->with('activity', $activity);
    }

    public function uploadPic(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'image' => ['image'],
        ],
            [
                'image.image' => 'Please upload a valid image file.'
            ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save(public_path('/uploads/image/' . $filename));


            $user = Auth::user();
            $user->image = $filename;
            $user->save();


            $user = Auth::user()->id;
            DB::table('users')->where('id', $user)->update(['image' => $filename]);

            return redirect()->back()->with("success", "Profile picture updated successfully!");
        }
        {
            return redirect()->back()->with("error", "Please upload a file to update profile picture.");
        }
    }


    public function updateProfile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => ['string', 'regex:/^[a-z ,.\' -] + $/i', 'max:50'],
            'last_name' => ['string', 'regex:/^[a-z ,.\' -] + $/i', 'max:50'],
            'about' => ['string', 'nullable', 'max:350'],
            'address' => ['regex:/(^[-0-9A-Za-z.,#\/ ]+$)/', 'nullable', 'max:100'],
            'services' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:150'],
            'specialization' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:150'],
            'education' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:50'],
            'experience' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:150'],
        ], [
            'first_name.max' => 'The first name may not be greater than 50 characters.',
            'first_name.regex' => 'The first name format is invalid',
            'last_name.max' => 'The last name may not be greater than 50 characters.',
            'last_name.regex' => 'The last name format is invalid',
            'about.max' => 'About field may not be greater than 350 characters.',
            'address.max' => 'Address field may not be greater than 100 characters.',
            'address.regex' => 'The address format is invalid',
            'services.max' => 'Services field may not be greater than 100 characters.',
            'services.regex' => 'The services format is invalid',
            'specialization.max' => 'Specialization field may not be greater than 150 characters.',
            'specialization.regex' => 'The specialization format is invalid',
            'education.max' => 'Education field may not be greater than 50 characters.',
            'education.regex' => 'The education format is invalid',
            'experience.max' => 'Experiences field may not be greater than 150 characters.',
            'experience.regex' => 'The experiences format is invalid',

        ]);


        User::where('id', Auth::user()->id)->update($request['user']);
        $user_id = Auth::user()->id;

        if ($validator->passes()) {
            $query = DB::table('doctor_infos')->where('user_id', $user_id)->update($request->except('_token', 'user'));


            if ($query == 1) {
                return back()->with("success", "Profile updated successfully !");
            } else {
                return back()->with("error", "Something went wrong! Please edit a field to update profile.");
            }
        } else {
            return back()->withErrors($validator);
        }

    }

    public function showChangePasswordForm()
    {
        return view('doctor.resetpass');
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        //Changed Doctor's Password
        $activity = ActivityLogger::activity("Changed Doctor's Password");

        return redirect()->back()->with("success", "Password changed successfully !")->with('activity', $activity);
    }


}
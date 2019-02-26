<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\userprofile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;
use Hash;
use Validator;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class UserSettingsController extends Controller
{
    public function __construct()
    {

    }

    public function settings()
    {


        $data = userprofile::Where('user_id', '=', Auth::id())->first();
        $user = User::find(Auth::id());

        //Viewed Settings
        $activity = ActivityLogger::activity("Viewed User Profile");

        return view('patient.settings', compact(['user', 'data']))->with('activity', $activity);
    }

    public function uploadPhoto(Request $request)
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


        $validator = Validator::make($request->all(), [
            'first_name' => ['string', 'regex:/^[a-z ,.\' -] + $/i', 'max:50'],
            'last_name' => ['string', 'regex:/^[a-z ,.\' -] + $/i', 'max:50'],
            'address' => ['regex:/(^[-0-9A-Za-z.,#\/ ]+$)/', 'nullable', 'max:200'],
            'phone' => ['regex:/(09)[0-9]{9}/', 'nullable', 'max:11', 'min:11'],
            'edod' => ['date', 'nullable'],
            'allergies' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:50'],
            'bloodtype' => ['regex:/^(A|B|AB|O)[-+]$/', 'nullable', 'max:3'],
            'clinic' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:50'],
            'doctor' => ['regex:/(^[-0-9A-Za-z.,-\/ ]+$)/', 'nullable', 'max:50'],
        ], [
            'first_name.max' => 'The first name may not be greater than 50 characters.',
            'first_name.regex' => 'The first name format is invalid',
            'last_name.max' => 'The last name may not be greater than 50 characters.',
            'last_name.regex' => 'The last name format is invalid',
            'address.max' => 'Address field may not be greater than 200 characters.',
            'address.regex' => 'The address format is invalid',
            'phone.max' => 'Contact number field may not be greater than 11 characters.',
            'phone.min' => 'Contact number field may not be lesser than 11 characters.',
            'phone.regex' => 'The contact number format is invalid',
            'edod.date' => 'The expected date of delivery format is not a valid date',
            'allergies.max' => 'Allergies field may not be greater than 100 characters.',
            'allergies.regex' => 'The allergies format is invalid',
            'bloodtype.max' => 'Blood type field may not be greater than 3 characters.',
            'bloodtype.regex' => 'The blood type format is invalid',
            'clinic.max' => 'Clinic field may not be greater than 50 characters.',
            'clinic.regex' => 'The clinic format is invalid',
            'doctor.max' => 'Attending Physician field may not be greater than 50 characters.',
            'doctor.regex' => 'The attending physician format is invalid',

        ]);


        User::where('id', Auth::id())->update($request['user']);
        $user_id = Auth::user()->id;

        if ($validator->passes()) {
            $query = DB::table('userprofiles')->where('user_id', $user_id)->update($request->except('_token', 'user'));
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
        return view('patient.resetpassword');
    }

    public function changePass(Request $request)
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
        $activity = ActivityLogger::activity("Changed Patient's Password");

        return redirect()->back()->with("success", "Password changed successfully !")->with('activity', $activity);
    }


}

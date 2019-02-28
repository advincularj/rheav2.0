<?php

namespace App\Http\Controllers;

use App\doctor_info;
use App\Http\Middleware\Patient;
use ConsoleTVs\Charts\Builder\Database;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Helper;
use Validator;
use Redirect;
use DB;

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
            'first_name' => ['string', 'required','max:50','regex:/^[a-z ,.\'-]+$/i'],
            'last_name' => ['string', 'required','max:50','regex:/^[a-z ,.\'-]+$/i'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required','numeric', 'digits_between:10,11','regex:/^[09]{2}[0-9]{9}$/',],
            'email' => ['required', 'string', 'email','email', 'unique:users'],
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
        ]);

//        $validator = Validator::make($request->all(), [
//            'first_name' => ['required', 'string', 'max:255'],
//            'last_name' => ['required', 'string', 'max:255'],
//            'birth_date' => ['required', 'date'],
//            'phone' => ['required', 'size:11'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
////            'password' => ['required', 'string', 'min:6', 'confirmed'],
//        ]);


        // If validator fails, short circut and redirect with errors
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // Handle File Upload
        if ($request->hasFile('image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNametoStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('uploads/image', $fileNametoStore);
        } else {
            $fileNametoStore = 'noimage.jpg';
        }

        //Generate a password for the new users
        $pw = User::generatePassword();
        //Create User (Doctor) -we can use new User because we included use App\User; here
        $user = new User;
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birth_date = $request->input('birth_date');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $pw;
        $user['role_id'] = 2;
//        $user->password= $request->input('password');
//        $user->user_id = auth()->user()->id;
        $user->image = $fileNametoStore;
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
//        $this->validate($request, [
//            'first_name' => ['required', 'string', 'max:255'],
//            'last_name' => ['required', 'string', 'max:255'],
//            'birth_date' => ['required', 'date'],
//            'phone' => ['required', 'number', 'size:11'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//            'password' => ['required', 'string', 'min:6', 'confirmed'],
//        ]);

        $validator = Validator::make($request->all(), [
            'first_name' => ['string', 'required','max:50','regex:/^[a-z ,.\'-]+$/i'],
            'last_name' => ['string', 'required','max:50','regex:/^[a-z ,.\'-]+$/i'],
            'birth_date' => ['required', 'date'],
            'phone' => ['required','numeric', 'digits_between:10,11','regex:/^[09]{2}[0-9]{9}$/',],
            'email' => ['required', 'string', 'email','email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6', 'max:64', 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            'password_confirmation' => ['required','same:password'],
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
        ]);

        // Handle File Upload
        if ($request->hasFile('image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNametoStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('uploads/image', $fileNametoStore);
        }

        //Create Post -we can use new 'model' because we included use App\User; here
        $user = User::find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->birth_date = $request->input('birth_date');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
//        $user->user_id = auth()->user()->id;
        if ($request->hasFile('image')) {
            $user->cover_image = $fileNametoStore;
        }
        $user->save();

        //Created Doctor Account
        $activity = ActivityLogger::activity("Updated Doctor Account");

        return redirect('/users')->with('success', 'User Updated')->with('activity', $activity);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        if ($user->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('uploads/image/' . $user->cover_image);
        }

        //Removed Doctor Account
        $activity = ActivityLogger::activity("Removed Doctor Page");

        return redirect('/users')->with('success', 'User Removed')->with('activity', $activity);
    }

    public function doctor(Request $request)
    {
        $input = $request->all();
        foreach ($input['id'] as $id) {
            $input['id'] = Auth::user()->id;
            User::destroy($input);

        }
        Return redirect()->back();
    }

    public function showprofile($id)
    {

        $user = doctor_info::where('user_id', $id)->first();

        return view('admin.doctorprofile', compact(['user']));
    }

//    public function action(Request $request){
//        if($request->ajax())
//        {
//            $output = '';
//            $query = $request->get('query');
//            if($query != '')
//            {
//                $data = DB::table('users')
//                    ->where('role_id', 2)
//                    ->where(function ($search) use ($query){
//                            $search->orWhere('first_name', 'like', '%'.$query.'%');
//                            $search->orWhere('last_name', 'like', '%'.$query.'%');
//                            $search->orWhere('email', 'like', '%'.$query.'%');
//                        }
//                    )
//                    ->orderBy('created_at', 'desc')
////                    ->paginate(5);
//                    ->get();
//
//            }
//            else
//            {
//                $data = DB::table('users')
//                    ->where('role_id', 2)
//                    ->orderBy('created_at', 'desc')
////                    ->paginate(5);
//                    ->get();
//            }
//            $total_row = $data->count();
//            if($total_row > 0)
//            {
//                foreach($data as $row)
//                {
//                    $output .= '
//                        <tr>
//                             <td>'.$row->first_name.' '.$row->last_name.'</td>
//                             <td>'.$row->email.'</td>
//                             <td>'.$row->created_at.'</td>
//                             <td>
//                                <a href="/doctorprofile/{{$row->id}}" class="btn btn-default btn-sm">View Profile</a>
//                             </td>
//                        </tr>
//                    ';
//                }
//            }
//            else
//            {
//                $output = '
//                   <tr>
//                        <td align="center" colspan="5">No Data Found</td>
//                   </tr>
//               ';
//            }
//            $data = array(
//                'table_data'  => $output,
//                'total_data'  => $total_row
//            );
//
//            echo json_encode($data);
//        }
//
//
//    }

//    function fetch_data(Request $request)
//    {
//        if($request->ajax())
//        {
//            $sort_by = $request->get('sortby');
//            $sort_type = $request->get('sorttype');
//            $query = $request->get('query');
//            $query = str_replace(" ", "%", $query);
//            $data = DB::table('users')
//                ->where('role_id', 2)
//                ->where(function ($search) use ($query){
//                    $search->orWhere('first_name', 'like', '%'.$query.'%');
//                    $search->orWhere('last_name', 'like', '%'.$query.'%');
//                    $search->orWhere('email', 'like', '%'.$query.'%');
//                    }
//                )
////                ->orderBy('created_at', 'desc')
////                ->paginate(5);
//                ->orderBy($sort_by, $sort_type)
//                ->paginate(5);
//            return view('admin.cruddoctors.pagination_data', ['data' => $data] )->render();
//        }
//    }

//    public function search(Request $request){
//        $search = $request->get('search');
//        $users = DB::table('users')
//            ->where('role_id', '2')
//            ->where('first_name', 'like', '%'.$search.'%')
//            ->orWhere('last_name', 'like', '%'.$search.'%')
//            ->orWhere('email', 'like', '%'.$search.'%')
//            ->orderBy('created_at', 'desc')
//            ->paginate(5);
//        return view('users', ['users' => $users]);
//    }
}

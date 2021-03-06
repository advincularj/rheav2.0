<?php

namespace App\Http\Controllers;

use App\userprofile;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\doctor_info;
use DB;
use Alert;
use Mail;

use App\Mail\AddedPatientNotif;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class DoctorPatientController extends Controller
{
    public function __construct()
    {

    }

    public function show()
    {
        $users = User::select('users.id', 'first_name', 'last_name', 'email', 'created_at')
            ->orderBy('created_at', 'dsc')
            ->leftjoin('patients', 'patients.patient_id', 'users.id')
            ->whereRaw('patients.patient_id IS null')
            ->where('role_id', 4)->paginate(10);
        return view('doctor.users')->with('users', $users);
    }

    public function index()
    {
//        $users = User::orderBy('created_at', 'dsc')
//            ->join('patients','patients.patient_id','users.id')
//            ->where('patients.doctor_id', Auth::user()->id)->paginate(10);

        $users = Patient::where('doctor_id', Auth::user()->id)->paginate(10);

//        $users = User::orderBy('created_at', 'dsc')->paginate(10);
        return view('doctor.patients')->with('users', $users);
    }

    public function addpatient(Request $request)
    {
        $input = $request->all();

        foreach ($input['id'] as $id) {
            $input['patient_id'] = $id;
            $input['doctor_id'] = Auth::user()->id;

            Patient::create($input);
//            $patient = Patient::find($id);
//            $user_id = $patient->patient_id;
            $user = User::find($id);
            $user->role_id = '3';
            $user->save();

            Alert::success("You have added this user as your patient.", "Added!")->persistent("Close");

            Mail::to($user->email)->send(new AddedPatientNotif());
        }


        Return redirect()->back();


    }

    public function patient(Request $request)
    {
        $input = $request->all();

        foreach ($input['id'] as $id) {
            $patient = Patient::find($id);
            $user_id = $patient->patient_id;
            $user = User::find($user_id);
            $user->role_id = '4';
            $user->save();
            Patient::destroy($id);

            Alert::success("You have removed a patient.", "Removed!")->persistent("Close");
        }
        Return redirect()->back();
    }

    public function showprofile($id)
    {

//        $user = userprofile::find($id);
        $user = Patient::where('patient_id', $id)->first();


        return view('doctor.patientprofile', compact(['user']));
    }

//    public function action(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = '';
//            $query = $request->get('query');
//            if ($query != '') {
//                $user = DB::table('users')
//                    ->where('role_id', 3)
//                    ->where(function ($search) use ($query) {
//                        $search->orWhere('first_name', 'like', '%' . $query . '%');
//                        $search->orWhere('last_name', 'like', '%' . $query . '%');
//                        $search->orWhere('email', 'like', '%' . $query . '%');
//                    }
//                    )
//                    ->orderBy('created_at', 'desc')
//                    ->get();
//            } else {
//                $user = DB::table('users')
//                    ->where('role_id', 3)
//                    ->orderBy('created_at', 'dsc')
//                    ->get();
//            }
//
//            $total_row = $user->count();
//            if ($total_row > 0) {
//                foreach ($user as $row) {
//                    $output .= '
//        <tr>
//        <td><input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"></td>
//         <td>' . $row->first_name . ' ' . $row->last_name . ' </td>
//         <td>' . $row->email . '</td>
//         <td>' . $row->created_at . '</td>
//         <td><div class="w3-show-inline-block offset-1">
//             <a href="/patientprofile/{{$user->patient_id}}" class="btn btn-primary btn-sm">View Profile</a>
//             <a href="/indexrecord/'. $row->id .'" class="btn btn-default btn-sm">View Check-up Records</a>
//             </div></td>
//        </tr>
//  ';
//                }
//            } else {
//                $output = '
//       <tr>
//        <td align="center" colspan="5">No Data Found</td>
//       </tr>
//       ';
//            }
//            $user = array(
//                'table_data' => $output,
//                'total_data' => $total_row
//            );
//
//            echo json_encode($user);
//        }
//    }




//    public function action(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = '';
//            $query = $request->get('query');
//            if ($query != '') {
//                $user = DB::table('users')
//                    ->where('role_id', 3)
//                    ->where(function ($search) use ($query) {
//                        $search->orWhere('first_name', 'like', '%' . $query . '%');
//                        $search->orWhere('last_name', 'like', '%' . $query . '%');
//                        $search->orWhere('email', 'like', '%' . $query . '%');
//                    }
//                    )
//                    ->orderBy('created_at', 'desc')
//                    ->get();
//            } else {
//                $user = DB::table('users')
//                    ->where('role_id', 3)
//                    ->orderBy('created_at', 'dsc')
//                    ->get();
//            }
//            $total_row = $user->count();
//            if ($total_row > 0) {
//                foreach ($user as $row) {
//                    $output .= '
//        <tr>
//        <td><input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"></td>
//         <td>' . $row->first_name . ' ' . $row->last_name . ' </td>
//         <td>' . $row->email . '</td>
//         <td>' . $row->created_at . '</td>
//         <td><div class="w3-show-inline-block offset-1">
//             <a href="/patientprofile/{{$user->patient_id}}" class="btn btn-primary btn-sm">View Profile</a>
//             <a href="/indexrecord" class="btn btn-default btn-sm">View Check-up Records</a>
//             </div></td>
//        </tr>
//  ';
//                }
//            } else {
//                $output = '
//       <tr>
//        <td align="center" colspan="5">No Data Found</td>
//       </tr>
//       ';
//            }
//            $user = array(
//                'table_data' => $output,
//                'total_data' => $total_row
//            );
//
//            echo json_encode($user);
//        }
//    }

//    public function addaction(Request $request)
//    {
//        if ($request->ajax()) {
//            $output = '';
//            $query = $request->get('query');
//            if ($query != '') {
//                $user = DB::table('users')
//                    ->where('role_id', 4)
//                    ->where(function ($search) use ($query) {
//                        $search->orWhere('first_name', 'like', '%' . $query . '%');
//                        $search->orWhere('last_name', 'like', '%' . $query . '%');
//                        $search->orWhere('email', 'like', '%' . $query . '%');
//                    }
//                    )
//                    ->orderBy('created_at', 'desc')
//                    ->get();
//            } else {
//                $user = DB::table('users')
//                    ->where('role_id', 4)
//                    ->orderBy('created_at', 'dsc')
//                    ->get();
//            }
//            $total_row = $user->count();
//            if ($total_row > 0) {
//                foreach ($user as $row) {
//                    $output .= '
//        <tr>
//        <td><input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"></td>
//         <td>' . $row->first_name . ' ' . $row->last_name . ' </td>
//         <td>' . $row->email . '</td>
//         <td>' . $row->created_at . '</td>
//        </tr>
//  ';
//                }
//            } else {
//                $output = '
//       <tr>
//        <td align="center" colspan="5">No Data Found</td>
//       </tr>
//       ';
//            }
//            $user = array(
//                'table_data' => $output,
//                'total_data' => $total_row
//            );
//
//            echo json_encode($user);
//        }
//    }





//    public function indexArchived()
//    {
//        $trash = Patient::withTrashed()
//            ->where('deleted_at', '!=', 'null')
//            ->get();
//        // show trashed data
////        $trash = DB::table('maternal_guides')
////            ->whereNotNull('deleted_at')->orderBy('created_at', 'dsc')
////            ->get();
////        $guides = MaternalGuide::orderBy('created_at', 'dsc')->get();
//
//        return view('doctor.archived', compact('trash'));
//    }
//
//    public function restore($id)
//    {
//        Patient::withTrashed()
//            ->where('id', $id)
//            ->restore();
//
//
//        // restore data
////        MaternalGuide::orderBy('created_at', 'dsc')->paginate(5)->where('id', $id)->restore();
////        $guides = MaternalGuide::onlyTrashed()->where('id', $id)->restore();
//        return redirect('/archivedpatients');
//    }

public function action(Request $request)
{
    if ($request->ajax()) {
        $output = '';
        $query = $request->get('query');
        if ($query != '') {
            $user = DB::table('users')
                ->where('role_id', 3)
                ->where(function ($search) use ($query) {
                    $search->orWhere('first_name', 'like', '%' . $query . '%');
                    $search->orWhere('last_name', 'like', '%' . $query . '%');
                    $search->orWhere('email', 'like', '%' . $query . '%');
                }
                )
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $user = DB::table('users')
                ->where('role_id', 3)
                ->orderBy('created_at', 'dsc')
                ->get();
        }

        $total_row = $user->count();
        if ($total_row > 0) {
            foreach ($user as $row) {
                $output .= '
        <tr>
        <td><input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"></td>
         <td>' . $row->first_name . ' ' . $row->last_name . ' </td>
         <td>' . $row->email . '</td>
         <td>' . $row->created_at . '</td>
         <td><div class="w3-show-inline-block offset-1">
             <a href="/patientprofile/{{$user->patient_id}}" class="btn btn-primary btn-sm">View Profile</a>
             <a href="/indexrecord/'. $row->id .'" class="btn btn-default btn-sm">View Check-up Records</a>
             </div></td>
        </tr>
  ';
            }
        } else {
            $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
        }
        $user = array(
            'table_data' => $output,
            'total_data' => $total_row
        );

        echo json_encode($user);
    }
}
}




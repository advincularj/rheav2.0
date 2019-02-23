<?php

namespace App\Http\Controllers;

use App\userprofile;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Patient;
use App\doctor_info;
use DB;

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
//            $input = DB::table('users')
//                ->where('role_id', 4)
//                ->update('role_id', 3)->save();
            Patient::create($input);

            //User::create(['role_id' => 3]);

        }

//        $input['role_id'] = 3;

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
        }
        Return redirect()->back();
    }

    public function showprofile($id)
    {

//        $user = userprofile::find($id);
        $user = Patient::where('patient_id', $id)->first();


        return view('doctor.patientprofile', compact(['user']));
    }


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
}


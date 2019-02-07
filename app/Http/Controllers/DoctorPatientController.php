<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Patient;

class DoctorPatientController extends Controller
{
    public function __construct()
    {

    }

    public function show()
    {
        $users = User::select('users.id', 'first_name', 'last_name', 'email', 'phone', 'birth_date','created_at')->orderBy('created_at', 'dsc')->leftjoin('patients','patients.patient_id','users.id')->whereRaw('patients.patient_id IS null')->where('role_id', 3)->paginate(10);
        return view('doctor.users')->with('users', $users);
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'dsc')->join('patients','patients.patient_id','users.id')->where('patients.doctor_id', Auth::user()->id)->paginate(10);
//        $users = User::orderBy('created_at', 'dsc')->paginate(10);
        return view('doctor.patients')->with('users', $users);
    }

    public function addpatient(Request $request)
    {
        $input = $request->all();
        foreach ($input['id'] as $id)
        {
            $input['patient_id'] = $id;
            $input['doctor_id'] = Auth::user()->id;
            Patient::create($input);
            Return redirect()->back();
        }
    }

    public function patient(Request $request)
    {
        $input = $request->all();
        foreach ($input['id'] as $id)
        {
            $input['patient_id'] = $id;
            $input['doctor_id'] = Auth::user()->id;
            Patient::destroy($input);
            Return redirect()->back();
        }
    }
}

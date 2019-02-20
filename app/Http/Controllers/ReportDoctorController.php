<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\doctor_info;
use DB;

class ReportDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dinfo = doctor_info::all();
        $doctor = User::all()->where('role_id', 2);
        return view('admin.reports.doctors', compact('doctor'))->with(['dinfo' => $dinfo, 'doctor' => $doctor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dinfo = doctor_info::find($id);
        /*dd($dashboard);*/
        $doctor = User::where('id', $id)
            /*->orderBy('timein', 'asc')->where('timein', '!=','0000-00-00 00:00:00')*/
            ->get();

        /* dd($vattendance);*/
        return view('admin.reports.doctors')->with(['dinfo' => $dinfo, 'doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

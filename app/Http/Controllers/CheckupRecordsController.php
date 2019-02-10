<?php

namespace App\Http\Controllers;

use App\CheckupRecords;
use foo\bar;
use Illuminate\Http\Request;

class CheckupRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $checkuprecords = CheckupRecords::all();

        return view('doctor.viewcheckup', compact('checkuprecords'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('doctor.createcheckup');
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
        $request->validate([
            'ieFindings'=>'required',
            'bloodPressure'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'heartTones'=>'required',
            'AOG'=>'required',
            'weightGain'=>'required'

        ]);
        $checkuprecords = new CheckupRecords([
            'ieFindings' => $request->get('ieFindings'),
            'bloodPressure' => $request->get('bloodPressure'),
            'height' => $request->get('height'),
            'weight' => $request->get('weight'),
            'heartTones' => $request->get('heartTones'),
            'AOG' => $request->get('AOG'),
            'weightGain' => $request->get('weightGain')
        ]);

        $checkuprecords->save();
        return redirect('indexrecord')->with('success', 'checkup record has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $checkuprecord = CheckupRecords::find($id);

        return view('doctor.editcheckup', compact('checkuprecord'));
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
        $request->validate([
            'ieFindings'=>'required',
            'bloodPressure'=>'required',
            'height'=>'required',
            'weight'=>'required',
            'heartTones'=>'required',
            'AOG'=>'required',
            'weightGain'=>'required'
        ]);

        $checkuprecord = CheckupRecords::find($id);
        $checkuprecord->ieFindings = $request->get('ieFindings');
        $checkuprecord->bloodPressure = $request->get('bloodPressure');
        $checkuprecord->height = $request->get('height');
        $checkuprecord->weight = $request->get('weight');
        $checkuprecord->heartTones = $request->get('heartTones');
        $checkuprecord->AOG = $request->get('AOG');
        $checkuprecord->weightGain = $request->get('weightGain');
        $checkuprecord->save();

        return redirect('/checkuprecords')->with('success', 'Checkup record has been updated');
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
        $checkuprecord = CheckupRecords::find($id);
        $checkuprecord->delete();

        return redirect('/checkuprecords')->with('success', 'Checkup record has been deleted Successfully');
    }
}

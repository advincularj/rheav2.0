<?php

namespace App\Http\Controllers;

use App\CheckupRecords;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use Pusher\Pusher;

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
        $checkuprecords = CheckupRecords::where("doctorid", Auth::user()->id)->get();

        //Viewed Checkup Record
        $activity = ActivityLogger::activity("Viewed Checkup Record");

        return view('doctor.viewcheckup', compact('checkuprecords'))->with('activity', $activity);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'ieFindings' => 'required',
            'bloodPressure' => 'required|regex:/\d{1,3}\/\d{1,3}/',
            'height' => 'required|numeric|',
            'weight' => 'required|numeric|(\d*\.?\d+)\s?(\w+)',
            'heartTones' => 'required|numeric',
            'AOG' => 'required|numeric',
            'weightGain' => 'required|numeric'

        ], [
            'bloodPressure.regex' => 'Must follow format ##/##'

        ]);
        $checkuprecords = new CheckupRecords([
            'ieFindings' => $request->get('ieFindings'),
            'bloodPressure' => $request->get('bloodPressure'),
            'height' => $request->get('height'),
            'weight' => $request->get('weight'),
            'heartTones' => $request->get('heartTones'),
            'AOG' => $request->get('AOG'),
            'weightGain' => $request->get('weightGain'),
            'doctorid' => auth::user()->id
        ]);

        //Created Checkup Record
        $activity = ActivityLogger::activity("Created Checkup Record");
        $this->sendNotification();
        $checkuprecords->save();
        return redirect('checkup')->with('success', 'checkup record has been added')->with('activity', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $checkuprecords = CheckupRecords::find($id);
        return view('doctor.showcheckup')->with('checkuprecords', $checkuprecords);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $checkuprecord = CheckupRecords::find($id);

        //Edited Checkup Record
        $activity = ActivityLogger::activity("Edited Checkup Record");

        return view('doctor.editcheckup', compact('checkuprecord'))->with('activity', $activity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'ieFindings' => 'required',
            'bloodPressure' => 'required',
            'height' => 'required',
            'weight' => 'required',
            'heartTones' => 'required',
            'AOG' => 'required',
            'weightGain' => 'required'
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

        //Updated Checkup Record
        $activity = ActivityLogger::activity("Updated Checkup Record");

        return redirect('/checkup')->with('success', 'Checkup record has been updated')->with('activity', $activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $checkuprecord = CheckupRecords::find($id);
        $checkuprecord->delete();

        //Updated Checkup Record
        $activity = ActivityLogger::activity("Deleted Checkup Record");

        return redirect('/checkup')->with('success', 'Checkup record has been deleted Successfully')->with('activity', $activity);
    }

    public function sendNotification()
    {
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            '6ef31bbfd6a4f31ed06a',
            '4621cb0be3b290ef3dda',
            '715720', $options
        );

        $message = "RHEA has sent a checkup record";

        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('notification', 'notification-event', $message);
    }

}

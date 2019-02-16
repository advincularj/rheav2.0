<?php

namespace App\Http\Controllers;

use App\PregnancyDiaries;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class PregnancyDiariesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $diaries = PregnancyDiaries::where("userid", Auth::user()->id)->get();

        //Viewed Pregnancy Diary
        $activity = ActivityLogger::activity("Viewed Pregnancy Diary");

        return view('patient.viewpregnancydiary', compact('diaries'))->with('activity', $activity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Viewed Create Page
        $activity = ActivityLogger::activity("Viewed Create Page for Pregnancy Diary");

        return view('patient.createpregnancydiary')->with('activity', $activity)->with('activity', $activity);


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
            'note'=>'required'

        ]);
        $pregnancydiaries = new PregnancyDiaries([
            'note' => $request->get('note'),
            'userid' => auth::user()->id

        ]);

        //Created Note for Pregnancy Diary
        $activity = ActivityLogger::activity("Created Note for Pregnancy Diary");

        $pregnancydiaries->save();
        return redirect('indexnote')->with('success', 'Pregnancy Note has been added')->with('activity', $activity);
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
        $diaries = PregnancyDiaries::find($id);

        //Edited Pregnancy Diary
        $activity = ActivityLogger::activity("Edited Pregnancy Diary");

        return view('patient.editpregnancydiary', compact('diaries'))->with('activity', $activity);
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
            'note'=>'required',
        ]);

        $diary = PregnancyDiaries::find($id);
        $diary->note = $request->get('note');
        $diary->save();

        //Updated Pregnancy Diary
        $activity = ActivityLogger::activity("Updated Pregnancy Diary");

        return redirect('/pregnancydiaries')->with('success', 'Pregnancy note has been updated')->with('activity', $activity);
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
        $diary = PregnancyDiaries::find($id);
        $diary->delete();

        //Deleted Pregnancy Diary
        $activity = ActivityLogger::activity("Deleted Pregnancy Diary");

        return redirect('/pregnancydiaries')->with('success', 'Pregnancy note has been deleted Successfully')->with('activity', $activity);
    }
}

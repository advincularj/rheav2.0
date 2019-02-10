<?php

namespace App\Http\Controllers;

use App\PregnancyDiaries;
use Illuminate\Http\Request;

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
        $diaries = PregnancyDiaries::all();

        return view('patient.viewpregnancydiary', compact('diaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patient.createpregnancydiary');


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

        ]);

        $pregnancydiaries->save();
        return redirect('indexnote')->with('success', 'Pregnancy Note has been added');
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

        return view('patient.editpregnancydiary', compact('diaries'));
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


        return redirect('/pregnancydiaries')->with('success', 'Pregnancy note has been updated');
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

        return redirect('/pregnancydiaries')->with('success', 'Pregnancy note has been deleted Successfully');
    }
}

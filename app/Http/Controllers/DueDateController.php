<?php

namespace App\Http\Controllers;

use App\DueDate;
use Illuminate\Http\Request;
Use App\User;
use Validator;
use Alert;

use Carbon\Carbon;


use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class DueDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('patient.due_date')->with('due',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Viewed Due Date Calculator
        $activity = ActivityLogger::activity("Viewed Due Date Calculator");

        return view('patient.due_date')->with('activity', $activity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'last_period' => ['required', 'date', 'before:tomorrow'],
        ], [
            'last_period.required' => 'The last period field is required.',
            'last_period.date' => 'The first name format is invalid',
            'last_period.before:tomorrow' => 'Date entered must be before tomorrow.',
        ]);

        // If validator fails, short circut and redirect with errors
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = new User;
        $due = new DueDate;
        $due->last_period = $request->input('last_period');
        $due->due_date = $due->last_period->addDays(280);
        $due->user_id = auth()->user()->id;
        $user->due_date_id = $due->id;
        $due->save();

        // Calculated Due Date
        $activity = ActivityLogger::activity("Calculated Due Date");

        return redirect('/duedate')->with('success', 'Calculated Due Date')->with('activity', $activity);

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

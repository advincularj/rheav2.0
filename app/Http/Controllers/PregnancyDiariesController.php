<?php

namespace App\Http\Controllers;

use App\MaternalGuide;
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
        $pregnancydiaries = PregnancyDiaries::where('userid', Auth::user()->id)->paginate(6);

        //Viewed Pregnancy Diary
        $activity = ActivityLogger::activity("Viewed Pregnancy Diary");

        return view('patient.diary.viewpregnancydiary', compact('pregnancydiaries'))->with('activity', $activity);
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

        return view('patient.diary.createpregnancydiary')->with('activity', $activity)->with('activity', $activity);


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
            'body'=>'required',
            'title'=>'required',
            'cover_images' => 'image|nullable|max:1999',
//            'image' => ['image'],

        ]);
        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
             // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNametoStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
        }else{
            $fileNametoStore = 'noimage.jpg';
        }

        $pregnancydiaries = new PregnancyDiaries;
        $pregnancydiaries->title = $request->input('title');
        $pregnancydiaries->body = $request->input('body');
        $pregnancydiaries->userid = auth()->user()->id;
        $pregnancydiaries->cover_image = $fileNametoStore;

        //Created Note for Pregnancy Diary
        $activity = ActivityLogger::activity("Created Note for Pregnancy Diary");

        $pregnancydiaries->save();
        return redirect('/diary')->with('success', 'Pregnancy Note has been added')->with('activity', $activity);
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
        $pregnancydiary = PregnancyDiaries::find($id);
        return view('patient.diary.showdiary')->with('pregnancydiary', $pregnancydiary);
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
        $pregnancydiaries = PregnancyDiaries::find($id);

        //Edited Pregnancy Diary
        $activity = ActivityLogger::activity("Edited Pregnancy Diary");

        return view('patient.diary.editpregnancydiary', compact('pregnancydiaries'))->with('activity', $activity);
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
            'body'=>'required',
            'title'=>'required',
            'cover_images' => 'image|nullable|max:1999',
//            'image' => ['image'],
        ]);

        if($request->hasFile('cover_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNametoStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNametoStore);
        }
        //Create MaternalGuide -we can use new 'model' because we included use App\MaternalGuide; here
        $pregnancydiaries = PregnancyDiaries::find($id);
        $pregnancydiaries->title = $request->input('title');
        $pregnancydiaries->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $pregnancydiaries->cover_image = $fileNametoStore;
        }
        $pregnancydiaries->save();

        //Updated Pregnancy Diary
        $activity = ActivityLogger::activity("Updated Pregnancy Diary");

        return redirect('diary')->with('success', 'Pregnancy note has been updated')->with('activity', $activity);
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

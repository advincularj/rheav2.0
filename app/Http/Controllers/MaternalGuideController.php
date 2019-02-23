<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\MaternalGuide;
use App\MaternalGuideCategory;
Use App\User;
use Alert;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;


use DB;

class MaternalGuideController extends Controller
{
    public function __construct()
    {
//
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $guides = MaternalGuide::orderBy('created_at', 'dsc')->paginate(10);
//        return view('admin.crudmaternalguides.index')->with('guides', $guides);

        //Viewed Maternal Guide Table
        $activity = ActivityLogger::activity("Viewed Maternal Guide Table");

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $guides = MaternalGuide::orderBy('created_at', 'dsc')->paginate(5);
        return view('admin.guide')->with('guides',$user->guides)->with('guides',$guides)->with('activity', $activity);
    }

    public function indexArchived()
    {
        $trash = MaternalGuide::withTrashed()
            ->where('deleted_at', '!=', 'null')
            ->get();
        // show trashed data
//        $trash = DB::table('maternal_guides')
//            ->whereNotNull('deleted_at')->orderBy('created_at', 'dsc')
//            ->get();
//        $guides = MaternalGuide::orderBy('created_at', 'dsc')->get();

        //Archived Maternal Guide Table
        $activity = ActivityLogger::activity("Archived Maternal Guide");

        return view('admin.crudmaternalguides.archived', compact('trash'))->with('activity', $activity);
    }

    public function restore($id)
    {
        MaternalGuide::withTrashed()
            ->where('id', $id)
            ->restore();

        //Archived Maternal Guide Table
        $activity = ActivityLogger::activity("Restored Maternal Guide");

        Alert::success("Your file has been restored.", "Restored!")->persistent("Close");

        // restore data
//        MaternalGuide::orderBy('created_at', 'dsc')->paginate(5)->where('id', $id)->restore();
//        $guides = MaternalGuide::onlyTrashed()->where('id', $id)->restore();
        return redirect('/archived')->with('activity', $activity);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Viewed Categories Table of Maternal Guide
        $activity = ActivityLogger::activity("Viewed Categories for Maternal Guide");

        $categories = MaternalGuideCategory::all();

        return view('admin.crudmaternalguides.create')->withCategories($categories)->with('activity', $activity);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required|integer',
            'body' => 'required',
            'cover_images' => 'image|nullable|max:1999'
        ]);

        // Handle File Upload
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

        //Create MaternalGuide -we can use new 'model' because we included use App\MaternalGuide; here
        $guide = new MaternalGuide;
        $guide->title = $request->input('title');
        $guide->category_id = $request->category_id;
        $guide->body = $request->input('body');
        $guide->user_id = auth()->user()->id;
        $guide->cover_image = $fileNametoStore;
        $guide->save();

        //Viewed Contents of Maternal Guide
        $activity = ActivityLogger::activity("Viewed Contents of Maternal Guide");


        return redirect('/guides')->with('success', 'Maternal Guide Created')->with('activity', $activity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Viewed Content of Maternal Guide
        $activity = ActivityLogger::activity("Viewed Content of Maternal Guide");

        $guide = MaternalGuide::find($id);
        return view('admin.crudmaternalguides.show')->with('guide', $guide)->with('activity', $activity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guide = MaternalGuide::find($id);
        $categories = MaternalGuideCategory::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        //Edited Maternal Guide
        $activity = ActivityLogger::activity("Edited for Maternal Guide");

        //Check for correct user
//        if(auth()->user()->id !==$guide->user_id){
//            return redirect('/guides')->with('error' , 'Unauthorized Page');
//        }
        return view('admin.crudmaternalguides.edit')->with('guide', $guide)->withCategories($cats)->with('activity', $activity);
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
        $this->validate($request, [
            'title' => 'required',
            'category_id' => 'required|integer',
            'body' => 'required'
        ]);

        // Handle File Upload
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
        $guide = MaternalGuide::find($id);
        $guide->title = $request->input('title');
        $guide->category_id = $request->input('category_id');
        $guide->body = $request->input('body');
        if($request->hasFile('cover_image')){
            $guide->cover_image = $fileNametoStore;
        }
        $guide->save();

        //Updated Maternal Guide
        $activity = ActivityLogger::activity("Updated Maternal Guide");

        return redirect('/guides')->with('success', 'Maternal Guide Updated')->with('activity', $activity);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = MaternalGuide::find($id);

        //Check for correct user
//        if(auth()->user()->id !==$guide->user_id){
//            return redirect('/guides')->with('error' , 'Unauthorized Page');
//        }
//
//        if($guide->cover_image != 'noimage.jpg'){
//            // Delete Image
//            Storage::delete('public/cover_images/'.$guide->cover_image);
//        }

        //Removed Maternal Guide
        $activity = ActivityLogger::activity("Removed Maternal Guide");

        // Sweet Alert
        Alert::success("Your file has been archived.", "Archived!")->persistent("Close");

        $guide ->delete();
        return redirect('/guides')->with('activity', $activity);
    }

}

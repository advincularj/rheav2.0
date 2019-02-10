<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MaternalGuide;
use App\MaternalGuideCategory;
use Illuminate\Support\Facades\Storage;

use Session;

class MaternalGuideCategoryController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display a view of all of our category
        // it will also have a form to create a new category

        $categories = MaternalGuideCategory::orderBy('created_at', 'dsc')->paginate(5);
        return view('admin.categories')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new category and then redirect back to index

        //Validate MaternalGuideCategory
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

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

        $category = new MaternalGuideCategory;
        $category->name = $request->name;
        $category->cover_image = $fileNametoStore;
        $category->save();
        Session::flash('success', 'New Category has been created');

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = MaternalGuideCategory::find($id);
        return view('admin.crudcategories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = MaternalGuideCategory::find($id);

        //Check for correct user
//        if(auth()->user()->id !==$category->user_id){
//            return redirect('/categories')->with('error' , 'Unauthorized Page');
//        }

        return view('admin.crudcategories.edit')->with('category', $category);
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
            'name' => 'required|max:255',
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

        //Create MaternalGuideCategory -we can use new 'model' because we included use App\MaternalGuide; here
        $category = MaternalGuideCategory::find($id);
        $category->name = $request->input('name');
        if($request->hasFile('cover_image')){
            $category->cover_image = $fileNametoStore;
        }
        $category->save();

        return redirect('/categories')->with('success', 'Maternal Guide Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = MaternalGuideCategory::find($id);

        //Check for correct user
//        if(auth()->user()->id !==$category->user_id){
//            return redirect('/categories')->with('error' , 'Unauthorized Page');
//        }
//
//        if($category->cover_image != 'noimage.jpg'){
//            // Delete Image
//            Storage::delete('public/cover_images/'.$category->cover_image);
//        }

        $category ->delete();
        return redirect('/categories')->with('success','Maternal Guide Category Removed');
    }
}


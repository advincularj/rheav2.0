<?php

namespace App\Http\Controllers;

use App\MaternalGuide;
use App\MaternalGuideCategory;
use Illuminate\Http\Request;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = MaternalGuideCategory::all();
//        dd($dashboard);
        $maternalguide = MaternalGuide::all();
        return view('pages.article', compact('maternalguide'))->with(['article' => $article, 'maternalguide' => $maternalguide]);
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
        $article = MaternalGuideCategory::find($id);
        /*dd($dashboard);*/
        $maternalguide = MaternalGuide::where('id', $id)
            /*->orderBy('timein', 'asc')->where('timein', '!=','0000-00-00 00:00:00')*/
            ->get();

        /* dd($vattendance);*/
        return view('pages.article')->with(['article' => $article, 'maternalguide' => $maternalguide]);
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

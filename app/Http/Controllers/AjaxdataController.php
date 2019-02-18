<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
//use DataTables;
use Yajra\Datatables\Datatables;

class AjaxdataController extends Controller
{
    function index()
    {
        return view('admin.ajaxdata');
        //http://127.0.0:8000/ajaxdata
    }

    function getdata()
    {
        $data = Data::select('first_name', 'last_name');
        return Datatables::make($data)->make(true);
    }
}

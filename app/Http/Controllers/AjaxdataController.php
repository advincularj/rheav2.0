<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data;
//use DataTables;
use Yajra\Datatables\Datatables;

class AjaxdataController extends Controller
{
    function index()
    {
//        return view('admin.reports.ajaxdata');
        return view('admin.reports.ajaxdata');
        //http://127.0.0:8000/ajaxdata
    }

//    function doctor()
//    {
//        return view('admin.reports.doctors');
//        //http://127.0.0:8000/ajaxdata
//    }

    function article()
    {
        return view('admin.reports.article');
        //http://127.0.0:8000/ajaxdata
    }

    function logs()
    {
        return view('admin.reports.userlogs');
        //http://127.0.0:8000/ajaxdata
    }



}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PdfReport;

class ReportsController extends Controller
{
    public function report (Request $request){

        // Retrieve any filters
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $users = Report::whereBetween('created_at', [$fromDate, $toDate])->paginate(10);


        return view('admin.report', compact(['users', 'fromDate', 'toDate']));


    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use PdfReport;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class ReportsController extends Controller
{
    public function report (Request $request){

        // Retrieve any filters
        /*$fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $users = Report::whereBetween('created_at', [$fromDate, $toDate])->paginate(10);

        //Viewed Reports
        $activity = ActivityLogger::activity("Viewed Reports");

        return view('admin.report', compact(['users', 'fromDate', 'toDate']))->with('activity', $activity);*/


        $items = Report::SELECT('*')
            -> join('calamities', 'calamities.calamityID', '=', 'reports.calamityID')
            -> paginate(10);
        return view('pages.report', compact('items'));

    }
}

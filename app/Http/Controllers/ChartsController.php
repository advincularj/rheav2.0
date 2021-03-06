<?php

namespace App\Http\Controllers;

use App\doctor_info;
use App\User;
use App\Patient;
use ConsoleTVs\Charts\Facades\Charts;
use DB;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class ChartsController extends Controller
{
    public function index()
    {
        $doctor = doctor_info::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $chart = Charts::database($doctor, 'bar', 'highcharts')
            ->title("Number of Doctor Profiles")
            ->elementLabel("Total Profiles")
            ->dimensions(2000, 1000)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);

        $doctor =DB::table('userprofiles')->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"), date('Y'))->get();
        $charts = Charts::database($doctor, 'bar', 'highcharts')
            ->title("Number of Patient Profiles")
            ->elementLabel("Total Profiles")
            ->dimensions(2000, 1000)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);

        $patient = User::all()->where('role_id', '3');


        $patient_chart = Charts::database($patient, 'bar', 'highcharts')
            ->title("Number of Patients")
            ->elementLabel("Total Patients")
            ->dimensions(2000, 1000)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);

        $user = DB::table('users')
            ->select(DB::raw("(CASE WHEN (status = 1) THEN 'Active' ELSE 'Inactive' END) as status"))
            ->get();
        $pie_chart = Charts::database($user, 'pie', 'highcharts')
            ->title('Active and Inactive Users')
            ->dimensions(2000, 1000)
            ->responsive(true)
            ->groupBy('status');

        $guide = DB::table('maternal_guides')
            ->select(DB::raw("(CASE WHEN (deleted_at = Null) THEN 'Active' ELSE 'Inactive' END) as deleted_at"))
            ->get();
        $barchart = Charts::database($guide, 'pie', 'highcharts')
            ->title("Maternal Guide")
            ->elementLabel("Total Guides")
            ->dimensions(2000, 1000)
            ->responsive(true)
            ->groupBy('deleted_at');

        $numpatient = DB::table('users')
            ->leftjoin('patients','patients.patient_id','users.id')
            ->where('role_id', 3)
            ->get();
        $barcharts = Charts::database($numpatient, 'bar', 'highcharts')
            ->title("Number of Patients per Doctor")
            ->elementLabel("Number of Patients per Doctor")
            ->dimensions(2000, 1000)
            ->responsive(true);

        //Viewed Charts
        $activity = ActivityLogger::activity("Viewed Charts");


        return view('admin.charts', compact('chart', 'charts', 'patient_chart', 'pie_chart', 'barchart', 'barcharts'))->with('activity', $activity);
    }

}
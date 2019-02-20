<?php

namespace App\Http\Controllers;
use App\User;
use App\doctor_info;
use App\userprofile;
use App\MaternalGuide;
use App\MaternalGuideCategory;
use DB;
use PDF;

use Illuminate\Http\Request;

class ReportPrintController extends Controller
{
    public function reportPrint($id)
    {
        $users = User::where('role_id', 2)->get();

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('admin.reports.doctors', compact('users'));
        return $pdf->stream();

//        if ($request->has('download')) {
//            $pdf = PDF::loadView('report');
//            return $pdf->download('report.pdf');
    }
}

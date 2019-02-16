<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\User;


class AuditController extends Controller
{
    public function index()
    {
        $audits = Activity::orderBy('created_at', 'desc')->get();
        return view('admin.audits', ['audits' => $audits]);
    }
}

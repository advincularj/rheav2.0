<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;

use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use Alert;



class AuditController extends Controller
{
    public function index()
    {
        $audits = Activity::orderBy('created_at', 'desc')->paginate(7);

        return view('admin.audits', ['audits' => $audits]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */

    public function indexArchived()
    {
        $trash = Activity::withTrashed()
            ->where('deleted_at', '!=', 'null')
            ->get();


        return view('admin.audits.archived', compact('trash'));
    }


    public function clearActivityLog(Request $request)
    {
        $activities = Activity::all();
        foreach ($activities as $activity) {
            $activity->delete();
        }

        // Sweet Alert
        Alert::success("Your files have been archived.", "Archived!")->persistent("Close");

        return redirect('audits');
    }

    /**
     * Destroy the specified resource from storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyActivityLog(Request $request)
    {
        $activities = Activity::onlyTrashed()->get();
        foreach ($activities as $activity) {
            $activity->forceDelete();
        }
        return redirect('/archived-audits');
    }

    /**
     * Restore the specified resource from soft deleted storage.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreClearedActivityLog(Request $request)
    {
        $activities = Activity::onlyTrashed()->get();
        foreach ($activities as $activity) {
            $activity->restore();
        }

        Alert::success("Your files have been Restored.", "Restored!")->persistent("Close");

        return redirect('/archived-audits');
    }
}

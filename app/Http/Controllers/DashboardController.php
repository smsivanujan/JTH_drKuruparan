<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $total_surgeries = DB::select("SELECT IFNULL(COUNT(id),0) AS totalSurgeries FROM  pregnancies");

        $today_surgeries = DB::select("SELECT IFNULL(COUNT(id),0) AS todaySurgeries FROM  pregnancies 
        WHERE DATE(created_at) = CURDATE()");

        $total_surgery_types = DB::select("SELECT IFNULL(COUNT(id),0) AS surgeryTypes FROM  pregnancies");

        return view('pages.index')
            ->with('total_surgeries', $total_surgeries)
            ->with('today_surgeries', $today_surgeries)
            ->with('total_surgery_types', $total_surgery_types);
    }
}

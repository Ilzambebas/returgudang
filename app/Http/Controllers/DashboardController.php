<?php

namespace App\Http\Controllers;

use App\Models\ReturnBarangDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function index() {
        $user  = User::where('level','user')->count();
        $pakai = ReturnBarangDetail::where('status_return','layak pakai')->count();
        $repair = ReturnBarangDetail::where('status_return','layak repair')->count();
        $semua = ReturnBarangDetail::count();
        $chart = ReturnBarangDetail::select('status_return',DB::raw('count(*) as total'))->groupBy('status_return')->get();
        // return $chart;
        return view('admin.pages.dashboard.dashboard',compact('user','pakai','repair','semua','chart'));
    }
}

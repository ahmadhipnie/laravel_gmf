<?php

namespace App\Http\Controllers\inspector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DashboardInspectorController extends Controller
{
    //
    public function index(Request $request)
    {

        $user = Auth::user();
        $id = $user->id;
        $nama = $user->name;

        //query untuk mengambil data total yang sudah diinspeksi oleh inspector
        $totalBarangTelahDiInspeksi = DB::table('last_inspection')
            ->where('id_user', $id)
            ->count();

        $totalBarangTelahDiInspeksiDaily = DB::table('daily_inspection')
            ->where('id_user', $id)
            ->count();

        return view('inspector.dashboard_inspector', compact(['nama', 'totalBarangTelahDiInspeksi', 'totalBarangTelahDiInspeksiDaily']));
    }
}

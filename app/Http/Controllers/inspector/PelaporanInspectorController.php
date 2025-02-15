<?php

namespace App\Http\Controllers\inspector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelaporanInspectorController extends Controller
{
    public function indexLastInspection()
    {
        $user = Auth::user();
        $id = $user->id;

        $getDataLastInspectionByIdUser = DB::table('last_inspection')
            ->join('barangs', 'last_inspection.id_barang', '=', 'barangs.id')
            ->select('last_inspection.*', 'barangs.deskripsi')
            ->where('last_inspection.id_user', '=', $id)
            ->get();

        return view('inspector.last_inspection_inspector', compact('getDataLastInspectionByIdUser'));
    }

    public function indexDailyInspection()
    {
        $user = Auth::user();
        $id = $user->id;

        $getDataDailyInspectionByIdUser = DB::table('daily_inspection')
            ->join('barangs', 'daily_inspection.id_barang', '=', 'barangs.id')
            ->select('daily_inspection.*', 'barangs.deskripsi')
            ->where('daily_inspection.id_user', '=', $id)
            ->get();

        return view('inspector.daily_inspection_inspector', compact('getDataDailyInspectionByIdUser'));
    }
}

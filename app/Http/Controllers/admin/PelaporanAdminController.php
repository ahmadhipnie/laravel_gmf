<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LastInspection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PelaporanAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $nama = $user->name;

        $getAllLastInspection = LastInspection::with(['user', 'barang'])->paginate(10);
        return view('admin.last_inspection_admin', compact(['nama', 'getAllLastInspection']));
    }


    public function indexDailyInspection()
    {
        $user = Auth::user();
        $nama = $user->name;

        $getAllDailyInspection = DB::table('daily_inspection')
            ->join('users', 'daily_inspection.id_user', '=', 'users.id')
            ->join('barang', 'daily_inspection.id_barang', '=', 'barang.id')
            ->select('daily_inspection.*', 'users.name as nama_user', 'barang.deskripsi as nama_barang')
            ->paginate(10);
        return view('admin.daily_inspection_admin', compact(['nama', 'getAllDailyInspection']));
    }

    public function detailLastInspection($id)
    {
        $user = Auth::user();
        $nama = $user->name;

        $lastInspection = LastInspection::with(['user', 'barang'])->findOrFail($id);
        return view('admin.detail_last_inspection_admin', compact(['nama', 'lastInspection']));
    }

    public function detailDailyInspection($id)
    {
        $user = Auth::user();
        $nama = $user->name;

        $dailyInspection = DB::table('daily_inspection')
            ->join('users', 'daily_inspection.id_user', '=', 'users.id')
            ->join('barang', 'daily_inspection.id_barang', '=', 'barang.id')
            ->select('daily_inspection.*', 'users.name as nama_user', 'barang.deskripsi as nama_barang')
            ->where('daily_inspection.id', $id)
            ->first();
        return view('admin.detail_daily_inspection_admin', compact(['nama', 'dailyInspection']));
    }

    public function destroyLastInspection($id)
    {
        try {
            $lastInspection = LastInspection::findOrFail($id);
            $lastInspection->delete();

            Alert::success('Success', 'Last Inspection berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menghapus Last Inspection: ' . $e->getMessage());
        }

        return redirect()->route('last_inspection_admin');
    }

    public function destroyDailyInspection($id)
    {
        try {
            DB::table('daily_inspection')->where('id', $id)->delete();

            Alert::success('Success', 'Daily Inspection berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menghapus Daily Inspection: ' . $e->getMessage());
        }

        return redirect()->route('daily_inspection_admin');
    }
}

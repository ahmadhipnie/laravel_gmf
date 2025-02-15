<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PDF;

class DashboardAdminController extends Controller
{


    public  function detail_barangscan($id)
    {

        $barang = Barang::find($id);
        return view('detail_barang', compact(['barang']));
    }
    public function exportPDF($id)
    {
        $barang = Barang::findOrFail($id);

        $options = [
            'isRemoteEnabled' => true // Aktifkan remote file access agar bisa membaca gambar
        ];

        $pdf = FacadePdf::loadView('label_pdf', compact('barang'))->setOptions($options);

        return $pdf->download('Label-' . $barang->id . '.pdf');
    }



    public function index(Request $request)
    {

        $user = Auth::user();

        $nama = $user->name;

        $totalBarang = Barang::count();
        $totalInspector = User::where('role', 'inspector')->count();

        $today = Carbon::today();


        $totalDailyInspectionToday = DB::table('daily_inspection')
            ->whereDate('created_at', $today)
            ->count();

        $totalLastInspectionToday = DB::table('last_inspection')
            ->whereDate('created_at', $today)
            ->count();


            $totalInspeksi = $totalLastInspectionToday + $totalDailyInspectionToday;





            return view('admin.dashboard_admin', compact(['nama', 'totalBarang', 'totalInspector', 'totalDailyInspectionToday', 'totalLastInspectionToday', 'totalInspeksi']));
        }


    public function hasil_scan($qr_code)
    {


        $barang = Barang::where('qr_code', $qr_code)->first();


        return view('hasil_scan', compact(['barang']));
    }
}

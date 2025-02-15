<?php

namespace App\Http\Controllers\inspector;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Daily_inspection;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BarangInspectorController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id = $user->id;
        $nama = $user->name;

        $getDataBarangAll = Barang::all();

        return view('inspector.barang_inspector', compact('getDataBarangAll', 'id', 'nama'));
    }

    public function tambahDailyInspection(Request $request) {

        $getDataBarangAll = Barang::all();

        $id_barang = $request->id_barang;

        return view('inspector.tambah_daily_inspection', compact('getDataBarangAll', 'id_barang'));
    }

    public function tambahLastInspection(Request $request) {

        $getDataBarangAll = Barang::all();

        $id_barang = $request->id_barang;

        return view('inspector.tambah_last_inspection', compact('getDataBarangAll', 'id_barang'));
    }

    public function storeLastInspection(Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'last_know_condition' => 'required',
            'functioning_properly' => 'required',
            'notes_finding' => 'required',
            'corrective_action_taken' => 'required',
            'additional_notes' => 'required',
            'follow_up_action' => 'required',
        ]);

        try {
            $user = Auth::user();
            $id = $user->id;

            DB::table('last_inspection')->insert([
                'id_barang' => $request->id_barang,
                'id_user' => $id,
                'date_of_last_inspection' => Carbon::now(),
                'last_know_condition' => $request->last_know_condition,
                'functioning_properly' => $request->functioning_properly,
                'notes_finding' => $request->notes_finding,
                'corrective_action_taken' => $request->corrective_action_taken,
                'additional_notes' => $request->additional_notes,
                'follow_up_action' => $request->follow_up_action,
                'created_at' => Carbon::now(),
            ]);

            Alert::success('Success', 'Last Inspection berhasil ditambahkan');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menambahkan Last Inspection: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('data_barang_inspector')->with('success', 'Last Inspection berhasil ditambahkan');
    }


    public function storeDailyInspection(Request $request) {
        $request->validate([
            'id_barang' => 'required',
            'physical_condition' => 'required',
            'functioning_properly' => 'required',
            'notes_finding' => 'required',
            'corrective_action_taken' => 'required',
            'additional_notes' => 'required',
            'follow_up_action' => 'required',
        ]);

        try {
            $user = Auth::user();
            $id = $user->id;

            DB::table('last_inspection')->insert([
                'id_barang' => $request->id_barang,
                'id_user' => $id,
                'date' => Carbon::now(),
                'physical_condition' => $request->physical_condition,
                'functioning_properly' => $request->functioning_properly,
                'notes_finding' => $request->notes_finding,
                'corrective_action_taken' => $request->corrective_action_taken,
                'additional_notes' => $request->additional_notes,
                'follow_up_action' => $request->follow_up_action,
                'created_at' => Carbon::now(),
            ]);

            Alert::success('Success', 'Last Inspection berhasil ditambahkan');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menambahkan Last Inspection: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('data_barang_inspector')->with('success', 'Last Inspection berhasil ditambahkan');
    }
}

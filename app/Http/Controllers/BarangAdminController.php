<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class BarangAdminController extends Controller
{
    public function index(Request $request)
    {

        $query = Barang::query();

        if ($request->has('cari')) {
            $search = $request->cari;
            $query->where(function ($q) use ($search) {
                $q->where('owner', 'like', "%$search%")
                    ->orWhere('kode_barang', 'like', "%$search%")
                    ->orWhere('work_order_number', 'like', "%$search%")
                    ->orWhere('model', 'like', "%$search%")
                    ->orWhere('serial_number', 'like', "%$search%")
                    ->orWhere('register_no', 'like', "%$search%")
                    ->orWhere('location', 'like', "%$search%");
            });
        }

        $data = $query->paginate(20);

        return view('admin.barang_admin', compact(['data']));
    }



    public function tambahBarangAdmin()
    {
        $title = "Tambah Barang";
        return view('admin.tambah_barang_admin', compact(['title']));
    }


    public function detail_barangadmin($id)
    {


        $barang = Barang::find($id);

        return view('admin.detail_barangadmin', compact(['barang']));
    }


    public function editBarangAdmin($id)
    {
        $barang = Barang::find($id);

        return view('admin.edit_barang_admin', compact(['barang']));
    }

    public function tambahBarangAdminpost(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'work_order_number' => 'required',
            'owner' => 'required',
            'model' => 'required',
            'serial_number' => 'required',
            'register_no' => 'required',
            'last_inspection_date' => 'nullable|date',
            'release_inspection_date' => 'nullable|date',
            'next_inspection_date' => 'nullable|date',
            'deskripsi' => 'nullable|string',
            'panjang' => 'nullable|numeric',
            'lebar' => 'nullable|numeric',
            'tinggi' => 'nullable|numeric',
            'location' => 'nullable|string',
            'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Proses upload gambar barang jika ada
        $imageName = null;
        if ($request->hasFile('img_url')) {
            $imageName = time() . '-' . Str::random(10) . '.' . $request->img_url->extension();
            $request->img_url->move(public_path('img/foto_barang'), $imageName);
        }

        // Pastikan format tanggal aman
        $last_inspection_date = $request->last_inspection_date ? date('Y-m-d', strtotime($request->last_inspection_date)) : null;
        $release_inspection_date = $request->release_inspection_date ? date('Y-m-d', strtotime($request->release_inspection_date)) : null;
        $next_inspection_date = $request->next_inspection_date ? date('Y-m-d', strtotime($request->next_inspection_date)) : null;

        // Generate QR Code
        // $qrCodeName = time() . '-' . Str::random(10) . '.png';
        // $qrCodePath = public_path('img/foto_qrcode/' . $qrCodeName);
        // $qrCodeUrl = url('/barang/' . $qrCodeName); // URL ke halaman tertentu
        // $qrCodeContent = QrCode::format('png')->size(200)->generate($qrCodeUrl);


        // if (file_put_contents($qrCodePath, $qrCodeContent) === false) {
        //     Alert::error('Error', 'Gagal menyimpan QR Code.');
        //     return redirect()->back()->with('error', 'Gagal menyimpan QR Code.');
        // }



        // Barang::create([
        //     'kode_barang' => $request->kode_barang,
        //     'work_order_number' => $request->work_order_number,
        //     'owner' => $request->owner,
        //     'model' => $request->model,
        //     'serial_number' => $request->serial_number,
        //     'register_no' => $request->register_no,
        //     'last_inspection_date' => $last_inspection_date,
        //     'release_inspection_date' => $release_inspection_date,
        //     'next_inspection_date' => $next_inspection_date,
        //     'deskripsi' => $request->deskripsi,
        //     'panjang' => $request->panjang,
        //     'lebar' => $request->lebar,
        //     'tinggi' => $request->tinggi,
        //     'location' => $request->location,
        //     'img_url' => $imageName, // Simpan nama gambar di database
        //     'qr_code' => $qrCodeName, // Simpan nama QR Code di database
        // ]);
        // Ambil nilai checkbox, jika tidak dicentang akan bernilai null
        $barang = new Barang();
        $barang->kode_barang = $request->kode_barang;
        $barang->work_order_number = $request->work_order_number;
        $barang->owner = $request->owner;
        $barang->manufacturer = $request->manufacturer;
        $barang->model = $request->model;
        $barang->serial_number = $request->serial_number;
        $barang->register_no = $request->register_no;
        $barang->last_inspection_date = $last_inspection_date;
        $barang->release_inspection_date = $release_inspection_date;
        $barang->next_inspection_date = $next_inspection_date;
        $barang->deskripsi = $request->deskripsi;
        $barang->panjang = $request->panjang;
        $barang->lebar = $request->lebar;
        $barang->tinggi = $request->tinggi;
        $barang->location = $request->location;
        $barang->img_url = $imageName;
        // $barang->qr_code = $qrCodeName;

        // Handle checkbox perawatan, default ke 0 jika tidak dicentang
        $barang->cleaning = $request->has('cleaning') ? 1 : 0;
        $barang->lubricant = $request->has('lubricant') ? 1 : 0;
        $barang->adjustment = $request->has('adjustment') ? 1 : 0;
        $barang->part_replacement = $request->has('part_replacement') ? 1 : 0;
        $barang->recheck = $request->has('recheck') ? 1 : 0;
        $barang->calibration = $request->has('calibration') ? 1 : 0;
        $barang->modification = $request->has('modification') ? 1 : 0;
        $barang->repair = $request->has('repair') ? 1 : 0;

        // Simpan data ke database
        $barang->save();




        Alert::success('success', 'Barang berhasil ditambahkan');
        return redirect()->route('data_barang_admin')->with('success', 'Barang berhasil ditambahkan.');
    }


    public function updateBarangAdmin(Request $request, $id)
    {


        if ($request->hasFile('img_url')) {
            # code...
            $validator = Validator::make($request->all(), [
                'kode_barang' => 'required',
                'work_order_number' => 'required',
                'owner' => 'required',
                'model' => 'required',
                'serial_number' => 'required',
                'register_no' => 'required',
                'last_inspection_date' => 'nullable|date',
                'release_inspection_date' => 'nullable|date',
                'next_inspection_date' => 'nullable|date',
                'deskripsi' => 'nullable|string',
                'panjang' => 'nullable|numeric',
                'lebar' => 'nullable|numeric',
                'tinggi' => 'nullable|numeric',
                'location' => 'nullable|string',
                'img_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        } else {
            # code...
            $validator = Validator::make($request->all(), [
                'kode_barang' => 'required',
                'work_order_number' => 'required',
                'owner' => 'required',
                'model' => 'required',
                'serial_number' => 'required',
                'register_no' => 'required',
                'last_inspection_date' => 'nullable|date',
                'release_inspection_date' => 'nullable|date',
                'next_inspection_date' => 'nullable|date',
                'deskripsi' => 'nullable|string',
                'panjang' => 'nullable|numeric',
                'lebar' => 'nullable|numeric',
                'tinggi' => 'nullable|numeric',
                'location' => 'nullable|string',
            ]);
        }


        if ($validator->fails()) {
            Alert::error('Gagal', $validator->messages());
            return back()->withErrors($validator)->withInput();
        }


        $cek = Barang::where('kode_barang', $request->kode_barang)->where('id', '!=', $id)->first();
        if ($cek) {
            Alert::error('Gagal', 'Kode barang sudah ada');
            return back()->withErrors($validator)->withInput();
            # code...
        }

        // Proses upload gambar barang jika ada
        $barang = Barang::find($id);
        $imageName = null;
        if ($request->hasFile('img_url')) {
            // Hapus gambar lama jika ada
            if ($barang && $barang->img_url) {
                $oldImagePath = public_path('img/foto_barang/' . $barang->img_url);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Simpan gambar baru
            $imageName = time() . '-' . Str::random(10) . '.' . $request->img_url->extension();
            $request->img_url->move(public_path('img/foto_barang'), $imageName);

            $barang->img_url = $imageName;
        }

        // Pastikan format tanggal aman
        $last_inspection_date = $request->last_inspection_date ? date('Y-m-d', strtotime($request->last_inspection_date)) : null;
        $release_inspection_date = $request->release_inspection_date ? date('Y-m-d', strtotime($request->release_inspection_date)) : null;
        $next_inspection_date = $request->next_inspection_date ? date('Y-m-d', strtotime($request->next_inspection_date)) : null;

        $barang->kode_barang = $request->kode_barang;
        $barang->work_order_number = $request->work_order_number;
        $barang->owner = $request->owner;
        $barang->manufacturer = $request->manufacturer;
        $barang->model = $request->model;
        $barang->serial_number = $request->serial_number;
        $barang->register_no = $request->register_no;
        $barang->last_inspection_date = $last_inspection_date;
        $barang->release_inspection_date = $release_inspection_date;
        $barang->next_inspection_date = $next_inspection_date;
        $barang->deskripsi = $request->deskripsi;
        $barang->panjang = $request->panjang;
        $barang->lebar = $request->lebar;
        $barang->tinggi = $request->tinggi;
        $barang->location = $request->location;

        // $barang->qr_code = $qrCodeName;

        // Handle checkbox perawatan, default ke 0 jika tidak dicentang
        $barang->cleaning = $request->cleaning;
        $barang->lubricant = $request->lubricant;
        $barang->adjustment = $request->adjustment;
        $barang->part_replacement = $request->part_replacement;
        $barang->recheck = $request->recheck;
        $barang->calibration = $request->calibration;
        $barang->modification = $request->modification;
        $barang->repair = $request->repair;

        // Simpan data ke database
        $barang->save();



        Alert::success('success', 'Barang berhasil diupdate');
        return redirect()->route('data_barang_admin')->with('success', 'Barang berhasil diupdate.');
    }



    public function hapus_barangadmin($id)
    {
        $barang = Barang::find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        // Hapus file gambar jika ada
        if ($barang->img_url) {
            $imagePath = public_path('img/foto_barang/' . $barang->img_url);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Hapus file QR code jika ada
        if ($barang->qr_code) {
            $qrCodePath = public_path('img/foto_qrcode/' . $barang->qr_code);
            if (file_exists($qrCodePath)) {
                unlink($qrCodePath);
            }
        }

        // Hapus data dari database
        $barang->delete();

        Alert::success('success', 'Barang berhasil dihapus');

        return redirect()->back()->with('success', 'Barang berhasil dihapus');
    }
}

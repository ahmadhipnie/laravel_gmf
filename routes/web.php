<?php

use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\admin\InspectorAdminController;
use App\Http\Controllers\admin\PelaporanAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangAdminController;
use App\Http\Controllers\inspector\BarangInspectorController;
use App\Http\Controllers\inspector\DashboardInspectorController;
use App\Http\Controllers\inspector\PelaporanInspectorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});



Route::get('/home', [AuthController::class, 'home'])->name('home');
Route::get('/landingPage', [AuthController::class, 'showLoginForm'])->name('showLoginForm');


Route::post('/login', [AuthController::class, 'login'])->name('loginn');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:inspector'])->group(function () {

    Route::prefix('inspector')->group(function () {

        Route::get('/dashboardInspector', [DashboardInspectorController::class, 'index'])->name('dashboard_inspector');

        Route::get('/dataBarangInspector', [BarangInspectorController::class, 'index'])->name('data_barang_inspector');

        Route::get('/tambahDailyInspection', [BarangInspectorController::class, 'tambahDailyInspection'])->name('tambah_daily_inspection');

        Route::get('/tambahLastInspection', [BarangInspectorController::class, 'tambahLastInspection'])->name('tambah_last_inspection');

        Route::post('/storeDailyInspection', [BarangInspectorController::class, 'storeDailyInspection'])->name('store_daily_inspection');
        Route::post('/storeLastInspection', [BarangInspectorController::class, 'storeLastInspection'])->name('store_last_inspection');

        Route::get('/LastInspectionInspector', [PelaporanInspectorController::class, 'indexLastInspection'])->name('last_inspection_inspector');
        Route::get('/DailyInspectionInspector', [PelaporanInspectorController::class, 'indexDailyInspection'])->name('daily_inspection_inspector');

        // // Route untuk pencarian barang secara realtime
        // Route::get('/search-barang-karyawan', [TransaksiController::class, 'searchBarang'])->name('searchBarangkaryawan');

        // // Route untuk menyimpan transaksi
        // Route::post('/transaksi-karyawan', [TransaksiController::class, 'store'])->name('transaksiStoreKaryawan');


        // Route::get('/laporan', [LaporanKaryawanController::class, 'index'])->name('laporan_karyawan');
        // Route::get('/laporan/export', [LaporanKaryawanController::class, 'export'])->name('laporan.export.karyawan');

    });
});
Route::get('/barang/{qr_code}', [DashboardAdminController::class, 'hasil_scan'])->name('hasil_scan');
Route::get('/detail_barang/{id}', [DashboardAdminController::class, 'detail_barangscan'])->name('detail_barangscan');
Route::get('/barang/export-pdf/{id}', [DashboardAdminController::class, 'exportPDF'])->name('exportPDFperbarang');
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboard_admin');

        Route::get('/dataBarangAdmin', [BarangAdminController::class, 'index'])->name('data_barang_admin');
        Route::get('/tambahBarangAdmin', [BarangAdminController::class, 'tambahBarangAdmin'])->name('tambahBarangAdmin');
        Route::post('/tambahBarangAdminpost', [BarangAdminController::class, 'tambahBarangAdminpost'])->name('tambahBarangAdminpost');
        Route::get('/hapus_barangadmin/{id}', [BarangAdminController::class, 'hapus_barangadmin'])->name('hapus_barangadmin');
        Route::get('/detail_barangadmin/{id}', [BarangAdminController::class, 'detail_barangadmin'])->name('detail_barangadmin');
        Route::get('/editBarangAdmin/{id}', [BarangAdminController::class, 'editBarangAdmin'])->name('editBarangAdmin');
        Route::put('/updateBarangAdmin/{id}', [BarangAdminController::class, 'updateBarangAdmin'])->name('updateBarangAdmin');



        Route::get('/dataIspector', [InspectorAdminController::class, 'index'])->name('data_inspector_admin');
        Route::post('/tambahInspectorAdmin', [InspectorAdminController::class, 'store'])->name('tambah_inspector_admin');
        Route::get('inspector/{id}/edit', [InspectorAdminController::class, 'edit'])->name('admin.inspector.edit');
        Route::put('inspector/{id}', [InspectorAdminController::class, 'update'])->name('admin.inspector.update');
        Route::delete('inspector/{id}', [InspectorAdminController::class, 'destroy'])->name('admin.inspector.destroy');


        Route::get('/LastInspectionAdmin', [PelaporanAdminController::class, 'index'])->name('last_inspection_admin');
        Route::get('/LastInspectionAdmin/{id}', [PelaporanAdminController::class, 'detailLastInspection'])->name('detail_last_inspection_admin');
        Route::delete('last-inspection/{id}', [PelaporanAdminController::class, 'destroyLastInspection'])->name('admin.last_inspection.destroy');


        Route::get('/DailyInspectionAdmin', [PelaporanAdminController::class, 'indexDailyInspection'])->name('daily_inspection_admin');
        Route::get('/DailyInspectionAdmin/{id}', [PelaporanAdminController::class, 'detailDailyInspection'])->name('detail_daily_inspection_admin');
        Route::delete('daily-inspection/{id}', [PelaporanAdminController::class, 'destroyDailyInspection'])->name('admin.daily_inspection.destroy');

        // Route::get('/dataKaryawanAdmin', [KaryawanAdminController::class, 'index'])->name('data_karyawan_admin');

        // // Route untuk update (edit) barang
        // Route::put('/barang/{barang_id}', [BarangAdminController::class, 'update'])->name('barang.update');

        // // Route untuk delete barang
        // Route::delete('/barang/{barang_id}', [BarangAdminController::class, 'destroy'])->name('barang.destroy');
        // Route::post('/barang', [BarangAdminController::class, 'store'])->name('barang.store');

        // // Route untuk menambahkan karyawan
        // Route::post('/karyawan', [KaryawanAdminController::class, 'store'])->name('karyawan.store');

        // // Route untuk mengupdate karyawan
        // Route::put('/karyawan/{id}', [KaryawanAdminController::class, 'update'])->name('karyawan.update');

        // // Route untuk menghapus karyawan
        // Route::delete('/karyawan/{id}', [KaryawanAdminController::class, 'destroy'])->name('karyawan.destroy');

        // Route::get('/laporan', [LaporanAdminController::class, 'index'])->name('laporan_admin');
        // Route::get('/laporan/export', [LaporanAdminController::class, 'export'])->name('laporan.export');


    });
});

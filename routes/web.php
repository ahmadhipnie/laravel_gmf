<?php

use App\Http\Controllers\admin\DashboardAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\inspector\DashboardInspectorController;
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

Route::get('/landingPage', [AuthController::class, 'showLoginForm'])->name('showLoginForm');


Route::post('/login', [AuthController::class, 'login'])->name('loginn');

Route::middleware(['auth', 'role:karyawan'])->group(function () {

    Route::prefix('karyawan')->group(function () {

        Route::get('/dashboardInspector', [DashboardInspectorController::class, 'index'])->name('dashboard_inspector');

        // Route::get('/dataBarangKaryawan', [BarangKaryawanController::class, 'index'])->name('data_barang_karyawan');

        // // Route untuk menampilkan halaman transaksi
        // Route::get('/transaksiKaryawan', [TransaksiController::class, 'index'])->name('transaksiKaryawan');

        // // Route untuk pencarian barang secara realtime
        // Route::get('/search-barang-karyawan', [TransaksiController::class, 'searchBarang'])->name('searchBarangkaryawan');

        // // Route untuk menyimpan transaksi
        // Route::post('/transaksi-karyawan', [TransaksiController::class, 'store'])->name('transaksiStoreKaryawan');


        // Route::get('/laporan', [LaporanKaryawanController::class, 'index'])->name('laporan_karyawan');
        // Route::get('/laporan/export', [LaporanKaryawanController::class, 'export'])->name('laporan.export.karyawan');

    });
});
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboardAdmin', [DashboardAdminController::class, 'index'])->name('dashboard_admin');
        // Route::get('/dataBarangAdmin', [BarangAdminController::class, 'index'])->name('data_barang_admin');
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


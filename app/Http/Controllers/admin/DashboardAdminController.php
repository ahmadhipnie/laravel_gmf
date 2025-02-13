<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DashboardAdminController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();

        $nama = $user->name;

        $totalBarang = Barang::count();



        return view('admin.dashboard_admin', compact(['nama']));

    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
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
        $totalInspector = User::where('role', 'inspector')->count();



        return view('admin.dashboard_admin', compact(['nama', 'totalBarang', 'totalInspector']));

    }
}

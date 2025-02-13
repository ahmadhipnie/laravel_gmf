<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardAdminController extends Controller
{
    public function index(Request $request)
    {

        $user = Session::get('nama');



        return view('admin.dashboard_admin', compact(['nama']));

    }
}

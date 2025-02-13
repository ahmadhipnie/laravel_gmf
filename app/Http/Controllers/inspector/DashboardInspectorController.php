<?php

namespace App\Http\Controllers\inspector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardInspectorController extends Controller
{
    //
    public function index(Request $request)
    {

        $user = Session::get('nama');

        return view('inspector.dashboard_inspector', compact(['nama']));

    }
}

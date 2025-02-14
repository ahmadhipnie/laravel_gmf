<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class InspectorAdminController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $nama = $user->name;

        $getAllInspector = User::where('role', 'inspector')->paginate(10);

        return view('admin.inspector_admin', compact(['nama', 'getAllInspector']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        try {
            User::create([
                'nip' => $request->nip,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => 'inspector',
            ]);
            Alert::success('Success', 'Inspector berhasil ditambahkan');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menambahkan inspector: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('data_inspector_admin')->with('success', 'Inspector berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|string|max:255|unique:users,nip,' . $id,
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        try {
            $inspector = User::findOrFail($id);
            $inspector->nip = $request->nip;
            $inspector->name = $request->name;
            if ($request->password) {
                $inspector->password = Hash::make($request->password);
            }
            $inspector->save();

            Alert::success('Success', 'Inspector berhasil diupdate');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal mengupdate inspector: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }

        return redirect()->route('data_inspector_admin')->with('success', 'Inspector berhasil diupdate');
    }

    public function destroy($id)
    {
        try {
            $inspector = User::findOrFail($id);
            $inspector->delete();

            Alert::success('Success', 'Inspector berhasil dihapus');
        } catch (\Exception $e) {
            Alert::error('Error', 'Gagal menghapus inspector: ' . $e->getMessage());
        }

        return redirect()->route('data_inspector_admin');
    }
}

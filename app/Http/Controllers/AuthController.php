<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm()
    {

        return view('login');
    }

    public function login(Request $request)
    {
        // $request->validate([
        //     'nip' => 'required',
        //     'password' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->messages());
            return redirect()->back()->withInput();
        }
        $credentials = [
            "nip" => $request->nip,
            "password" => $request->password
        ];



        try {

            if (auth()->attempt($credentials)) {

                Alert::success('success', 'Login Berhasil di lakukan');

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();
                    Alert::success('Success', 'Login Berhasil di lakukan');
                    // return redirect()->intended('dashboard');

                    if (auth()->user()->role == 'admin') {
                        return redirect()->route('dashboard_admin');
                    } elseif (auth()->user()->role == 'inspector') {
                        return redirect()->route('dashboard_inspector');
                    }
                } else {
                    Alert::error('Gagal', "email atau password salah");
                    return back();
                }
                // return redirect()->route('dashboard');
            } else {
                Alert::error('Gagal', 'nip / Password salah');
                return redirect()->back()->withInput();
            }



            // $nip = $request->input('nip');
            // $password = $request->input('password');

            // $user = User::where('nip', $nip)->first();

            // if ($user && Hash::check($password, $user->password)) {
            //     Session::put("nama", $user->nama);
            //     Session::put("role", $user->role);
            //     if ($user->role == 'admin') {
            //         return redirect()->route('dashboard_admin');
            //     } elseif ($user->role == 'inspector') {
            //         return redirect()->route('dashboard_inspector');
            //     }
            // }

            // return redirect()->back()->withInput($request->only('nip'))->withErrors([
            //     'nip' => 'Invalid credentials',
            // ]);


        } catch (Exception $e) {
            return redirect()->back()->withInput($request->only('nip'))->withErrors([
                'error' => 'An error occurred during login. Please try again.',
            ]);
        }
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the token to prevent CSRF attacks
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'nip' => 'required',
                'password' => 'required',
            ]);

            $nip = $request->input('nip');
            $password = $request->input('password');

            $user = User::where('nip', $nip)->first();

            if ($user && Hash::check($password, $user->password)) {
                Session::put("nama", $user->nama);
                Session::put("role", $user->role);
                if ($user->role == 'admin') {
                    return redirect()->route('dashboard_admin');
                } elseif ($user->role == 'inspector') {
                    return redirect()->route('dashboard_inspector');
                }
            }

            return redirect()->back()->withInput($request->only('nip'))->withErrors([
                'nip' => 'Invalid credentials',
            ]);
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

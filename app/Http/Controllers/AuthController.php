<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //tampilkan login 
    public function showLoginForm()
    {
        return view('login');
    }

    //proses login 
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // cek login dulu
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        // kalau gagal login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    //dashboard
    public function dashboard()
    {
        return view('dashboard');
    }   
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}

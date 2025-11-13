<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function showLogin() 
    {
        return view('auth.login');
    }
    
    public function handleLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Masukkan format email yang sesuai',
            'password.required' => 'Kata sandi tidak boleh kosong',
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json(['status' => 'success', 'message' => 'Login berhasil']);
        }
        
        return response()->json(['status' => 'failed', 'message' => 'Email atau kata sandi salah'], 401);
    }
}

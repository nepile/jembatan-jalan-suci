<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController
{
    public function index()
    {
        return view('admin.settings');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        $user = Auth::guard('web')->user(); // FIX PENTING

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan / belum login.');
        }

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        $user->password = $request->new_password; // sudah auto hashed
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }

}

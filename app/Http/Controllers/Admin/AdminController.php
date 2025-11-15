<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController
{
    /**
     * Tampilkan semua data admin
     */
    public function index()
    {
        $admins = User::orderBy('id', 'desc')->get();

        return view('admin.admin', compact('admins'));
    }

    /**
     * Simpan admin baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'status'   => 'required|in:Aktif,Nonaktif',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'status'   => $request->status,
        ]);

        return back()->with('success', 'Admin berhasil dibuat.');
    }

    /**
     * Update admin
     */
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users,email,' . $admin->id,
            'status' => 'required|in:Aktif,Nonaktif',
        ]);

        $admin->name  = $request->name;
        $admin->email = $request->email;
        $admin->status = $request->status;

        if ($request->password) {
            $request->validate(['password' => 'min:6']);
            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return back()->with('success', 'Admin berhasil diperbarui.');
    }

    /**
     * Hapus admin
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return back()->with('success', 'Admin berhasil dihapus.');
    }
}

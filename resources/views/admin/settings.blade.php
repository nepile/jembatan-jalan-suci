@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Pengaturan Website</h1>

<div class="bg-white p-6 rounded-lg shadow max-w-4xl">
    <form>
        {{-- Ganti Password Admin --}}
        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Ganti Password Admin</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block mb-2 font-semibold">Password Lama</label>
                <input type="password" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" placeholder="Masukkan password lama">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Password Baru</label>
                <input type="password" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" placeholder="Masukkan password baru">
            </div>
            <div class="md:col-span-2">
                <label class="block mb-2 font-semibold">Konfirmasi Password Baru</label>
                <input type="password" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" placeholder="Ulangi password baru">
            </div>
        </div>
        
        {{-- Tombol Aksi --}}
        <div class="flex justify-end space-x-3 border-t pt-4">
            <button type="reset" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                Reset
            </button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Pengaturan Website</h1>

<div class="bg-white p-6 rounded-lg shadow max-w-4xl">
    <form>
        {{-- Bagian Identitas Website --}}
        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Identitas Website</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block mb-2 font-semibold">Nama Website</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="Jembatan Jalan Suci">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Tagline</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="Menyalurkan Kebaikan Dengan Amanah">
            </div>
        </div>

        {{-- Bagian Kontak --}}
        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Kontak & Media Sosial</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block mb-2 font-semibold">Email Admin</label>
                <input type="email" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="admin@mail.com">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Nomor Kontak</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="08123456789">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Instagram</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="@jembatanjalansuci">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Facebook</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="facebook.com/jembatanjalansuci">
            </div>
        </div>

        {{-- Bagian Rekening Donasi --}}
        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Rekening Donasi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block mb-2 font-semibold">Nama Bank</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="BCA">
            </div>
            <div>
                <label class="block mb-2 font-semibold">No Rekening</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="1234567890">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Atas Nama</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" value="Yayasan Jembatan Suci">
            </div>
        </div>

        {{-- Bagian Rekening Admin --}}
        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Rekening Admin</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div>
                <label class="block mb-2 font-semibold">Nama Bank</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" placeholder="Contoh: BNI">
            </div>
            <div>
                <label class="block mb-2 font-semibold">No Rekening</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" placeholder="Masukkan nomor rekening admin">
            </div>
            <div>
                <label class="block mb-2 font-semibold">Atas Nama</label>
                <input type="text" class="w-full border rounded p-2 focus:ring focus:ring-blue-300" placeholder="Nama pemilik rekening admin">
            </div>
        </div>

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

        {{-- Bagian Logo --}}
        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Logo & Tampilan</h2>
        <div class="mb-6">
            <label class="block mb-2 font-semibold">Logo Website</label>
            <div class="flex items-center gap-4">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-16 w-16 border rounded p-2 bg-gray-50">
                <input type="file" class="border p-2 rounded w-full text-sm">
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

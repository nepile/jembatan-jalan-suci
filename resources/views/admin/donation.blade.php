@extends('layouts.admin')

@section('title', 'Data Donasi')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Data Donasi</h1>

{{-- Ringkasan Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-blue-900 text-white rounded-xl p-4 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-sm opacity-80">Total Donasi</h2>
            <p class="text-2xl font-bold mt-1">Rp 12.500.000</p>
        </div>
    </div>

    <div class="bg-blue-900 text-white rounded-xl p-4 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-sm opacity-80">Jumlah Donatur</h2>
            <p class="text-2xl font-bold mt-1">35 Orang</p>
        </div>
    </div>

    <div class="bg-blue-900 text-white rounded-xl p-4 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-sm opacity-80">Program Aktif</h2>
            <p class="text-2xl font-bold mt-1">5 Program</p>
        </div>
    </div>
</div>

{{-- Tombol dan Tabel Donasi --}}
<div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold text-blue-900">Daftar Donasi Masuk</h2>
    <button class="px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 shadow-sm">
        + Tambah Donasi
    </button>
</div>

<div class="overflow-x-auto bg-white rounded-xl shadow-lg border border-gray-200">
    <table class="min-w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="px-4 py-3 text-left">#</th>
                <th class="px-4 py-3 text-left">Donatur</th>
                <th class="px-4 py-3 text-left">Nominal</th>
                <th class="px-4 py-3 text-left">Telepon</th>
                <th class="px-4 py-3 text-left">Bank</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3 font-medium text-gray-700">1</td>
                <td class="px-4 py-3">
                    <div class="font-semibold text-gray-900">Budi Santoso</div>
                    <div class="text-gray-500 text-xs">budi@mail.com</div>
                </td>
                <td class="px-4 py-3 text-green-600 font-semibold">Rp 500.000</td>
                <td class="px-4 py-3 text-gray-700">0812-3456-789</td>
                <td class="px-4 py-3 text-gray-700">BCA</td>
                <td class="px-4 py-3">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-600">
                        Pending
                    </span>
                </td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-2">
                        <button class="px-3 py-1 text-xs bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Detail
                        </button>
                        <button class="px-3 py-1 text-xs bg-green-500 text-white rounded-lg hover:bg-green-600 transition">
                            Verifikasi
                        </button>
                        <button class="px-3 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            Hapus
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection

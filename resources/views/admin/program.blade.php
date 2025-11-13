@extends('layouts.admin')

@section('title', 'Program Donasi')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Program Donasi</h1>
        <button class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
            + Tambah Program
        </button>
    </div>

    {{-- Tabel Program Donasi --}}
    <div class="overflow-x-auto bg-white shadow-md rounded-xl">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-blue-800 text-white">
                <tr>
                    <th class="px-6 py-3 font-semibold">#</th>
                    <th class="px-6 py-3 font-semibold">Nama Program</th>
                    <th class="px-6 py-3 font-semibold">Deskripsi</th>
                    <th class="px-6 py-3 font-semibold">Target Donasi</th>
                    <th class="px-6 py-3 font-semibold">Terkumpul</th>
                    <th class="px-6 py-3 font-semibold">Deadline</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">1</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Bantuan Panti Asuhan</td>
                    <td class="px-6 py-4 text-gray-600">
                        Membantu anak-anak panti asuhan untuk kebutuhan sehari-hari.
                    </td>
                    <td class="px-6 py-4 text-green-600 font-semibold">Rp 10.000.000</td>
                    <td class="px-6 py-4 text-blue-600 font-semibold">Rp 7.500.000</td>
                    <td class="px-6 py-4 text-gray-700">31 Desember 2025</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm">
                                Edit
                            </button>
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">2</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">Donasi Bencana Alam</td>
                    <td class="px-6 py-4 text-gray-600">
                        Membantu korban bencana alam di Indonesia.
                    </td>
                    <td class="px-6 py-4 text-green-600 font-semibold">Rp 20.000.000</td>
                    <td class="px-6 py-4 text-blue-600 font-semibold">Rp 12.000.000</td>
                    <td class="px-6 py-4 text-gray-700">15 Januari 2026</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            <button class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm">
                                Edit
                            </button>
                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">
                                Hapus
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

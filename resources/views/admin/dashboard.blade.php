@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow mb-6">
    <h1 class="text-2xl font-bold text-blue-800 mb-2">Dashboard</h1>
    <p class="text-gray-600">Selamat datang di panel admin. Berikut ringkasan donasi terkini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-blue-800 text-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-sm uppercase text-blue-200">Total Donasi</h2>
        <p class="text-2xl font-bold mt-2">Rp {{ number_format($donationTotal, 0, ',', '.') }}</p>
    </div>
    <div class="bg-blue-700 text-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-sm uppercase text-blue-200">Jumlah Pendonasi</h2>
        <p class="text-3xl font-bold mt-2">{{ $donaturTotal . ' Orang' }}</p>
    </div>
    <div class="bg-blue-600 text-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-sm uppercase text-blue-200">Program Aktif</h2>
        <p class="text-3xl font-bold mt-2">{{ $donationProgramTotal . ' Program'}}</p>
    </div>
    {{-- <div class="bg-blue-500 text-white p-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-sm uppercase text-blue-200">Sukses Tersalurkan</h2>
        <p class="text-2xl font-bold mt-2">Rp 8.200.000</p>
    </div> --}}
</div>
@endsection

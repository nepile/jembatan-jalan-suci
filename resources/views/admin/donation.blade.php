@extends('layouts.admin')

@section('title', 'Data Donasi')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Data Donasi</h1>

{{-- Ringkasan Statistik --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="bg-blue-900 text-white rounded-xl p-4 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-sm opacity-80">Total Donasi</h2>
            <p class="text-2xl font-bold mt-1">Rp {{number_format($donationTotal, 0, ',', '.')}}</p>
        </div>
    </div>
    
    <div class="bg-blue-900 text-white rounded-xl p-4 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-sm opacity-80">Jumlah Donatur</h2>
            <p class="text-2xl font-bold mt-1">{{$donaturTotal . ' Orang'}}</p>
        </div>
    </div>
    
    <div class="bg-blue-900 text-white rounded-xl p-4 shadow-md flex justify-between items-center">
        <div>
            <h2 class="text-sm opacity-80">Program Aktif</h2>
            <p class="text-2xl font-bold mt-1">{{$donationProgramTotal . ' Program'}}</p>
        </div>
    </div>
</div>

{{-- Tombol dan Tabel Donasi --}}
<div class="flex items-center justify-between mb-4">
    <h2 class="text-lg font-semibold text-blue-900">Daftar Donasi Masuk</h2>
    {{-- <button class="px-4 py-2 bg-blue-900 text-white rounded-lg hover:bg-blue-800 shadow-sm">
        + Tambah Donasi
    </button> --}}
    <form method="GET" action="">
        <label for="status" class="block mb-2.5 text-sm font-medium text-heading">Status Pembayaran</label>

        <select 
            id="status" 
            name="status"
            class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body"
            onchange="this.form.submit()"
        >
            <option value="Semua" selected>Semua</option>
            <option value="Sukses" {{ $selectedStatus == 'Sukses' ? 'selected' : '' }}>Sukses</option>
            <option value="Menunggu" {{ $selectedStatus == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="Gagal" {{ $selectedStatus == 'Gagal' ? 'selected' : '' }}>Gagal</option>
            <option value="Kadaluarsa" {{ $selectedStatus == 'Kadaluarsa' ? 'selected' : '' }}>Kadaluarsa</option>
            <option value="Dibatalkan" {{ $selectedStatus == 'Dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
        </select>
    </form>
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
            @foreach ($donations as $donate)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="px-4 py-3 font-medium text-gray-700">{{$loop->iteration}}</td>
                <td class="px-4 py-3">
                    <div class="font-semibold text-gray-900">{{$donate->full_name}}</div>
                    <div class="text-gray-500 text-xs">{{$donate->email}}</div>
                </td>
                <td class="px-4 py-3 @if($donate->status == 'Sukses') text-green-600 @elseif($donate->status == 'Menunggu') text-yellow-600 @else text-red-600 @endif font-semibold">Rp {{ number_format($donate->amount, 0, ',', '.') }}</td>
                <td class="px-4 py-3 text-gray-700">{{$donate->phone_number}}</td>
                <td class="px-4 py-3 text-gray-700">{{ucfirst(trans("$donate->bank"))}}</td>
                <td class="px-4 py-3">
                    @if ($donate->status == 'Menunggu')
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-600">
                        {{$donate->status}}
                    </span>
                    @elseif($donate->status == 'Sukses')
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-600">
                        {{$donate->status}}
                    </span>
                    @else
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-600">
                        {{$donate->status}}
                    </span>
                    @endif
                </td>
                <td class="px-4 py-3 text-center">
                    <div class="flex justify-center gap-2">
                        <button  class="px-3 py-1 text-xs bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                            Detail
                        </button>



                        @if ($donate->status != 'Sukses')
                        <button class="px-3 py-1 text-xs bg-red-500 text-white rounded-lg hover:bg-red-600 transition">
                            Hapus
                        </button>
                        @endif
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

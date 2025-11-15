@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<h1 class="text-2xl font-bold text-blue-900 mb-6">Pengaturan Website</h1>

{{-- Notifikasi --}}
@if(session('success'))
    <div class="p-3 mb-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="p-3 mb-4 bg-red-100 text-red-600 rounded">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div class="p-3 mb-4 bg-red-100 text-red-600 rounded">
        <ul class="list-disc ml-5">
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="bg-white p-6 rounded-lg shadow max-w-4xl">
    <form action="{{ route('admin.settings.updatePassword') }}" method="POST">
        @csrf

        <h2 class="text-lg font-semibold mb-4 border-b pb-2 text-blue-800">Ganti Password Admin</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div>
                <label class="block mb-2 font-semibold">Password Lama</label>
                <input type="password" name="old_password"
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                       placeholder="Masukkan password lama" required>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Password Baru</label>
                <input type="password" name="new_password"
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                       placeholder="Masukkan password baru" required>
            </div>

            <div class="md:col-span-2">
                <label class="block mb-2 font-semibold">Konfirmasi Password Baru</label>
                <input type="password" name="confirm_password"
                       class="w-full border rounded p-2 focus:ring focus:ring-blue-300"
                       placeholder="Ulangi password baru" required>
            </div>
        </div>

        <div class="flex justify-end space-x-3 border-t pt-4">
            <button type="reset"
                class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                Reset
            </button>
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Simpan Pengaturan
            </button>
        </div>
    </form>
</div>
@endsection

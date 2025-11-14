@extends('layouts.admin')

@section('title', 'Program Donasi')

@section('content')
    {{-- CSS Kustom untuk Transformasi Tabel Responsif (Mobile View) --}}
    <style>
        /* Sembunyikan header tabel pada layar di bawah 640px */
        @media (max-width: 639px) {
            thead {
                display: none;
            }

            /* Perlakukan baris tabel (tr) sebagai kartu pada mobile */
            tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #e5e7eb; /* Border kartu */
                border-radius: 0.5rem;
                background-color: white;
            }

            /* Perlakukan sel tabel (td) sebagai elemen blok, gunakan text-align: right */
            td {
                display: block;
                text-align: right !important; 
                padding: 0.75rem 1.5rem; 
                border-bottom: 1px solid #f3f4f6; /* Garis pemisah antar field di dalam kartu */
            }

            /* Tambahkan label kolom sebelum data (menggunakan data-label) */
            td::before {
                content: attr(data-label);
                float: left;
                font-weight: 600; 
                color: #1f2937; 
                margin-right: 1rem;
            }
            
            /* Hapus garis pemisah pada sel terakhir */
            tr td:last-child {
                border-bottom: none;
            }
            
            /* Pastikan tombol aksi mengambil lebar penuh di mobile untuk kemudahan sentuhan */
            .mobile-full-width-btn {
                 width: 100%;
            }
        }
    </style>

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Program Donasi</h1>
        {{-- TOMBOL TAMBAH PROGRAM (Pemicu/Dispatch Event) --}}
        <button @click="$dispatch('add-program-modal')" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
            + Tambah Program
        </button>
    </div>

    {{-- Tabel Program Donasi --}}
    {{-- Menggunakan sm:overflow-x-auto hanya untuk tablet/desktop jika lebar --}}
    <div class="bg-white shadow-md rounded-xl sm:overflow-x-auto">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-blue-800 text-white sm:table-header-group">
                <tr>
                    <th class="px-6 py-3 font-semibold">No</th>
                    <th class="px-6 py-3 font-semibold">Nama Program</th>
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold">Target Donasi</th>
                    <th class="px-6 py-3 font-semibold">Terkumpul</th>
                    <th class="px-6 py-3 font-semibold">Deadline</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($programs as $program)
                {{-- Menghapus border-b pada tr untuk mobile agar border dihandle oleh CSS --}}
                <tr class="hover:bg-gray-50 transition sm:border-b">
                    {{-- PENTING: Tambahkan data-label untuk mobile view --}}
                    <td class="px-6 py-4" data-label="No">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 font-semibold text-gray-800" data-label="Nama Program">{{ $program->title }}</td>
                    <td class="px-6 py-4 @if($program->status == 'AKTIF') text-green-600 @else text-red-600 @endif" data-label="Status">
                        {{ $program->status }}
                    </td>
                    <td class="px-6 py-4 text-green-600 font-semibold" data-label="Target Donasi">Rp {{ number_format($program->target, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-blue-600 font-semibold" data-label="Terkumpul">Rp {{ number_format($program->donation->where('status', 'Sukses')->sum('amount'), 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-gray-700" data-label="Deadline">{{ date('d M Y', strtotime($program->deadline)) }}</td>
                    <td class="px-6 py-4 text-center" data-label="Aksi">
                        {{-- Menggunakan flex-wrap dan menambahkan kelas w-full pada tombol di mobile --}}
                        <div class="flex flex-wrap justify-center gap-2">
                            {{-- Tombol Edit (Pemicu/Dispatch Event) --}}
                            <button 
                                @click="$dispatch('edit-program-modal{{ $program->program_id }}')" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm sm:w-auto mobile-full-width-btn"
                            >
                                Edit
                            </button>
                            <x-form-modal name="edit-program-modal{{ $program->program_id }}" title="✏️ Edit Program Donasi">
                                <form action="{{ route('admin.program.update', $program->program_id) }}" method="POST" class="space-y-4" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- Nama Program --}}
                                    <div>
                                        <label for="edit_nama" class="block text-sm font-medium text-gray-700">Nama Program</label>
                                        <input type="text" id="edit_nama" name="title" value="{{ $program->title }}" required 
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                    </div>

                                    {{-- Target Donasi --}}
                                    <div>
                                        <label for="edit_target" class="block text-sm font-medium text-gray-700">Target Donasi (Rp)</label>
                                        <input type="number" id="edit_target" name="target" value="{{ $program->target }}" required min="1000"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                    </div>

                                    {{-- Deadline --}}
                                    <div>
                                        <label for="edit_deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                                        <input type="date" id="edit_deadline" name="deadline" value="{{ $program->deadline }}" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                    </div>
                                    
                                    {{-- Deskripsi --}}
                                    <div>
                                        <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea id="edit_deskripsi" name="description" rows="3" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">{{ $program->description }}</textarea>
                                    
                                    </div>

                                    <div>
                                        <label for="edit_status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select id="edit_status" name="status" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                            <option value="AKTIF" @if($program->status == 'AKTIF') selected @endif>AKTIF</option>
                                            <option value="NONAKTIF" @if($program->status == 'NONAKTIF') selected @endif>NONAKTIF</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="edit_banner" class="block text-sm font-medium text-gray-700">Gambar Poster</label>
                                        <input type="file" id="edit_banner" name="banner"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                        <a href="{{ asset($program->banner) }}" target="_blank" class="text-blue-500 hover:text-blue-700 text-sm mt-1 inline-block">
                                            Preview Poster Saat Ini
                                        </a>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-lg -mx-6 -mb-6">
                                        <button type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                            Perbarui Program
                                        </button>
                                        <button type="button" @click="open = false"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </x-form-modal>

                            @if($program->donation->where('status', 'Sukses')->count() < 1)
                            <button @click="$dispatch('delete-program-modal{{ $program->program_id }}')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm sm:w-auto mobile-full-width-btn">
                                Hapus
                            </button>
                            @endif
                            <x-delete-modal 
                                name="delete-program-modal{{ $program->program_id }}" 
                                title="🗑️ Hapus Program" 
                                {{-- Pesan Hapus Dinamis --}}
                                message="Anda akan menghapus Program '{{ $program->title }}'. Tindakan ini tidak dapat dibatalkan.">
                                <form action="{{ route('admin.program.delete', $program->program_id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit"
                                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                                            Hapus
                                        </button>
                                        <button type="button" @click="open = false"
                                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </x-delete-modal>

                        </div>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    <x-form-modal name="add-program-modal" title="+ Tambah Program Donasi">
        <form action="{{ route('admin.program.create') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            {{-- Nama Program --}}
            <div>
                <label for="add_nama" class="block text-sm font-medium text-gray-700">Nama Program</label>
                <input type="text" id="add_nama" name="title" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
            </div>

            {{-- Target Donasi --}}
            <div>
                <label for="add_target" class="block text-sm font-medium text-gray-700">Target Donasi (Rp)</label>
                <input type="number" id="add_target" name="target" required min="1000"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
            </div>

            {{-- Deadline --}}
            <div>
                <label for="add_deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                <input type="date" id="add_deadline" name="deadline" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
            </div>
            
            {{-- Deskripsi --}}
            <div>
                <label for="add_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="add_deskripsi" name="description" rows="3" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"></textarea>
            </div>

            <div>
                <label for="add_banner" class="block text-sm font-medium text-gray-700">Gambar Poster</label>
                <input type="file" id="add_banner" accept=".jpg,.jpeg,.png" name="banner" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
            </div>

            {{-- Menambahkan kelas penyesuaian margin/padding untuk footer modal --}}
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse rounded-b-lg -mx-6 -mb-6">
                <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Buat Program
                </button>
                <button type="button" @click="open = false"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </form>
    </x-form-modal>


@endsection
@extends('layouts.admin')

@section('title', 'Data Admin')

@section('content')
    {{-- CSS Kustom untuk Transformasi Tabel Responsif (Mobile View) --}}
    <style>
        /* Target layar di bawah breakpoint sm (640px) */
        @media (max-width: 639px) {
            /* Sembunyikan header tabel */
            thead {
                display: none;
            }

            /* Perlakukan baris tabel (tr) sebagai kartu pada mobile */
            tr {
                display: block;
                margin-bottom: 1rem;
                border: 1px solid #e5e7eb; 
                border-radius: 0.75rem; /* Lebih membulat */
                background-color: white;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            }

            /* Perlakukan sel tabel (td) sebagai elemen blok */
            td {
                display: block;
                text-align: right !important; /* Data berada di kanan */
                padding: 0.75rem 1.5rem; 
                border-bottom: 1px solid #f3f4f6;
            }

            /* Tambahkan label kolom sebelum data (menggunakan data-label) */
            td::before {
                content: attr(data-label);
                float: left;
                font-weight: 600; 
                color: #1f2937; 
                margin-right: 1rem;
            }
            
            /* Hapus garis pemisah pada sel terakhir di dalam kartu */
            tr td:last-child {
                border-bottom: none;
            }

            /* Pastikan tombol aksi menempati lebar penuh di mobile */
            .mobile-full-width-actions .flex {
                flex-direction: column;
                gap: 0.5rem; /* Jarak antar tombol */
            }

            .mobile-full-width-actions .flex button {
                width: 100%;
                justify-content: center;
                display: flex;
            }
        }
    </style>

    <div class="p-4 sm:p-6 lg:p-8 space-y-8">
        {{-- JUDUL DAN TOMBOL AKSI --}}
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <h1 class="text-2xl lg:text-3xl font-extrabold text-blue-900 tracking-tight">Data Admin</h1>
            
            {{-- TOMBOL TAMBAH ADMIN (Pemicu/Dispatch Event) --}}
            <button @click="$dispatch('add-admin-modal')" 
                    class="w-full sm:w-auto px-6 py-2 bg-blue-700 text-white rounded-xl hover:bg-blue-800 transition duration-300 shadow-xl shadow-blue-300/50 font-semibold flex items-center justify-center space-x-2 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <span>Tambah Admin</span>
            </button>
        </div>

        {{-- TABEL DATA ADMIN (Responsive Container) --}}
        {{-- Menghapus overflow-x-auto pada div pembungkus tabel agar tidak terjadi horizontal scroll di mobile --}}
        <div class="bg-white shadow-2xl rounded-xl border border-gray-100">
            <div class="w-full">
                <table class="min-w-full text-left text-sm">
                    <thead class="bg-blue-800 text-white text-base">
                        <tr>
                            <th class="px-4 py-3 sm:px-6 font-bold w-16">No</th>
                            <th class="px-4 py-3 sm:px-6 font-bold">Username/Nama</th>
                            <th class="px-4 py-3 sm:px-6 font-bold">Email</th>
                            <th class="px-4 py-3 sm:px-6 font-bold text-center">Status</th>
                            <th class="px-4 py-3 sm:px-6 font-bold text-center w-32">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        {{-- Data Dummy Statis untuk Admin --}}
                        @php
                            $users = [
                                (object)['id' => 1, 'name' => 'Super Admin Utama', 'email' => 'admin.utama@mail.com', 'status' => 'Aktif'],
                                (object)['id' => 2, 'name' => 'User Nonaktif', 'email' => 'user.nonaktif@mail.com', 'status' => 'Nonaktif'],
                                (object)['id' => 3, 'name' => 'Moderator Konten', 'email' => 'moderator@mail.com', 'status' => 'Aktif'],
                            ];
                        @endphp
                        
                        @foreach($users as $user)
                        <tr class="hover:bg-blue-50/50 transition duration-150 sm:border-b">
                            {{-- PENTING: Tambahkan data-label untuk mobile view --}}
                            <td class="px-4 py-3 sm:px-6 text-gray-600" data-label="No">{{$loop->iteration}}</td>
                            <td class="px-4 py-3 sm:px-6 font-semibold text-gray-800" data-label="Username/Nama">{{$user->name}}</td>
                            <td class="px-4 py-3 sm:px-6 text-gray-700" data-label="Email">{{$user->email}}</td>
                            <td class="px-4 py-3 sm:px-6 text-center" data-label="Status">
                                <span class="px-3 py-1 text-xs font-bold rounded-full 
                                    @if($user->status == 'Aktif') bg-green-100 text-green-700 border border-green-300 @else bg-red-100 text-red-700 border border-red-300 @endif">
                                    {{$user->status}}
                                </span>
                            </td>
                            <td class="px-4 py-3 sm:px-6 text-center mobile-full-width-actions" data-label="Aksi">
                                <div class="flex justify-center gap-2">
                                    {{-- Tombol Edit --}}
                                    <button 
                                        @click="$dispatch('edit-admin-modal', {id: {{ $user->id }}, name: '{{ $user->name }}', email: '{{ $user->email }}', status: '{{ $user->status }}'})" 
                                        class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm transition duration-150 shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793z" />
                                            <path d="M11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </svg>
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    <button 
                                        @click="$dispatch('delete-admin-modal', {id: {{ $user->id }}, name: '{{ $user->name }}'})" 
                                        class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm transition duration-150 shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    {{-- --- MODAL TAMBAH ADMIN (Form Statis) --- --}}
    <x-form-modal name="add-admin-modal" title="+ Tambah Admin Baru">
        {{-- action form di set ke # (statis) --}}
        <form action="#" method="POST" class="space-y-4">
            @csrf 
            
            {{-- Nama Admin --}}
            <div>
                <label for="add_name" class="block text-sm font-medium text-gray-700">Username/Nama</label>
                <input type="text" id="add_name" name="name" required 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
            </div>

            {{-- Email --}}
            <div>
                <label for="add_email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="add_email" name="email" required 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
            </div>

            {{-- Password --}}
            <div>
                <label for="add_password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="add_password" name="password" required 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
            </div>

            {{-- Status --}}
            <div>
                <label for="add_status" class="block text-sm font-medium text-gray-700">Status Akun</label>
                <select id="add_status" name="status" required
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>
            
            {{-- Tombol Aksi Modal --}}
            <div class="bg-gray-50 p-4 sm:p-6 sm:flex sm:flex-row-reverse -mx-4 -mb-4 sm:-mx-6 sm:-mb-6 rounded-b-xl border-t">
                <button type="submit"
                    class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Buat Admin
                </button>
                <button type="button" @click="open = false"
                    class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </form>
    </x-form-modal>

    {{-- --- MODAL EDIT ADMIN (Menggunakan Alpine.js untuk pre-fill data statis) --- --}}
    <div x-data="{ 
        open: false, 
        userId: null, 
        userName: '', 
        userEmail: '', 
        userStatus: '',
        handleDispatch(e) {
            this.userId = e.detail.id;
            this.userName = e.detail.name;
            this.userEmail = e.detail.email;
            this.userStatus = e.detail.status;
            this.open = true;
        }
    }" 
    @edit-admin-modal.window="handleDispatch($event)">

        <x-form-modal name="edit-admin-modal" title="✏️ Edit Data Admin">
            {{-- action form di set ke # (statis) --}}
            <form action="#" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                {{-- Nama Admin (pre-filled by Alpine) --}}
                <div>
                    <label for="edit_name" class="block text-sm font-medium text-gray-700">Username/Nama</label>
                    <input type="text" id="edit_name" name="name" x-model="userName" required 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
                </div>

                {{-- Email (pre-filled by Alpine) --}}
                <div>
                    <label for="edit_email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="edit_email" name="email" x-model="userEmail" required 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
                </div>

                 {{-- Password (Opsional) --}}
                <div>
                    <label for="edit_password" class="block text-sm font-medium text-gray-700">Password Baru (Kosongkan jika tidak diubah)</label>
                    <input type="password" id="edit_password" name="password" 
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
                </div>

                {{-- Status (pre-filled by Alpine) --}}
                <div>
                    <label for="edit_status" class="block text-sm font-medium text-gray-700">Status Akun</label>
                    {{-- Select box perlu x-bind:value untuk pre-select opsi yang benar --}}
                    <select id="edit_status" name="status" x-model="userStatus" required
                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2.5 border">
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>
                
                {{-- Tombol Aksi Modal --}}
                <div class="bg-gray-50 p-4 sm:p-6 sm:flex sm:flex-row-reverse -mx-4 -mb-4 sm:-mx-6 sm:-mb-6 rounded-b-xl border-t">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Perbarui Admin
                    </button>
                    <button type="button" @click="open = false"
                        class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </x-form-modal>
    </div>

    {{-- --- MODAL HAPUS ADMIN (Menggunakan Alpine.js untuk pre-fill data statis) --- --}}
    <div x-data="{ 
        open: false, 
        userId: null,
        userName: '',
        handleDispatch(e) {
            this.userId = e.detail.id;
            this.userName = e.detail.name;
            this.open = true;
        }
    }" 
    @delete-admin-modal.window="handleDispatch($event)">

        <x-delete-modal name="delete-admin-modal" title="🗑️ Hapus Data Admin" :message="false">
             <template x-if="userName">
                <p class="text-sm text-gray-500 mb-6 p-1 border border-red-200 bg-red-50 rounded-lg">
                    Anda yakin ingin menghapus Admin: 
                    <span class="font-bold text-red-700" x-text="userName"></span>? 
                    Tindakan ini tidak dapat dibatalkan. (ID Statis: <span x-text="userId"></span>)
                </p>
            </template>
            
            {{-- action form di set ke # (statis) --}}
            <form action="#" method="POST" class="w-full">
                @csrf
                @method('DELETE')
                <div class="bg-gray-50 p-4 sm:p-6 sm:flex sm:flex-row-reverse -mx-4 -mb-4 sm:-mx-6 sm:-mb-6 rounded-b-xl border-t">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                        Hapus Permanen
                    </button>
                    <button type="button" @click="open = false"
                        class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </x-delete-modal>
    </div>
@endsection
@extends('layouts.admin')

@section('title', 'Data Admin')

@section('content')
<style>
    @media (max-width: 639px) {
        thead { display: none; }
        tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.75rem;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        td {
            display: block;
            text-align: right !important;
            padding: 0.75rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
        }
        td::before {
            content: attr(data-label);
            float: left;
            font-weight: 600;
            color: #1f2937;
        }
        tr td:last-child { border-bottom: none; }

        .mobile-full-width-actions .flex {
            flex-direction: column;
            gap: 0.5rem;
        }
        .mobile-full-width-actions .flex button {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="p-4 sm:p-6 lg:p-8 space-y-8">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <h1 class="text-2xl lg:text-3xl font-extrabold text-blue-900">Data Admin</h1>

        <button @click="$dispatch('add-admin-modal')" 
            class="w-full sm:w-auto px-6 py-2 bg-blue-700 text-white rounded-xl hover:bg-blue-800 shadow-xl flex items-center justify-center gap-2 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
            </svg>
            <span>Tambah Admin</span>
        </button>
    </div>

    {{-- TABLE --}}
    <div class="bg-white shadow-2xl rounded-xl border border-gray-100">
        <table class="min-w-full text-left text-sm">
            <thead class="bg-blue-800 text-white text-base">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @foreach($admins as $user)
                <tr class="hover:bg-blue-50/50 transition">

                    <td class="px-4 py-3" data-label="No">{{ $loop->iteration }}</td>

                    <td class="px-4 py-3 font-semibold" data-label="Nama">{{ $user->name }}</td>

                    <td class="px-4 py-3" data-label="Email">{{ $user->email }}</td>

                    <td class="px-4 py-3 text-center" data-label="Status">
                        <span class="px-3 py-1 text-xs font-bold rounded-full 
                            {{ $user->status == 'Aktif' 
                                ? 'bg-green-100 text-green-700 border border-green-300' 
                                : 'bg-red-100 text-red-700 border border-red-300' }}">
                            {{ $user->status }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center mobile-full-width-actions" data-label="Aksi">
                        <div class="flex justify-center gap-2">

                            {{-- EDIT --}}
                            <button 
                                @click="$dispatch('edit-admin-modal', {
                                    id: {{ $user->id }},
                                    name: '{{ $user->name }}',
                                    email: '{{ $user->email }}',
                                    status: '{{ $user->status }}'
                                })"
                                class="p-2 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg text-sm shadow-md">
                                ✏️
                            </button>

                            {{-- DELETE --}}
                            <button 
                                @click="$dispatch('delete-admin-modal', {
                                    id: {{ $user->id }},
                                    name: '{{ $user->name }}'
                                })"
                                class="p-2 bg-red-600 hover:bg-red-700 text-white rounded-lg text-sm shadow-md">
                                🗑️
                            </button>
                        </div>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

{{-- =================== MODAL TAMBAH =================== --}}
<x-form-modal name="add-admin-modal" title="+ Tambah Admin Baru">
    <form action="{{ route('admin.admin.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" class="mt-1 block w-full border p-2.5 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" class="mt-1 block w-full border p-2.5 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="mt-1 block w-full border p-2.5 rounded-lg" required>
        </div>

        <div>
            <label class="block text-sm font-medium">Status</label>
            <select name="status" class="mt-1 block w-full border p-2.5 rounded-lg">
                <option value="Aktif">Aktif</option>
                <option value="Nonaktif">Nonaktif</option>
            </select>
        </div>

        <div class="bg-gray-50 p-4 sm:flex sm:flex-row-reverse border-t">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Buat Admin</button>
            <button type="button" @click="open = false" class="px-4 py-2 bg-white text-gray-700 ml-2 border rounded-lg">Batal</button>
        </div>
    </form>
</x-form-modal>

{{-- =================== MODAL EDIT =================== --}}
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
}" @edit-admin-modal.window="handleDispatch($event)">
    
    <x-form-modal name="edit-admin-modal" title="✏️ Edit Admin">
        <form :action="'/admin/admin/update/' + userId" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium">Nama</label>
                <input type="text" name="name" x-model="userName" class="mt-1 block w-full border p-2.5 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" x-model="userEmail" class="mt-1 block w-full border p-2.5 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium">Password Baru (opsional)</label>
                <input type="password" name="password" class="mt-1 block w-full border p-2.5 rounded-lg">
            </div>

            <div>
                <label class="block text-sm font-medium">Status</label>
                <select name="status" x-model="userStatus" class="mt-1 block w-full border p-2.5 rounded-lg">
                    <option value="Aktif">Aktif</option>
                    <option value="Nonaktif">Nonaktif</option>
                </select>
            </div>

            <div class="bg-gray-50 p-4 sm:flex sm:flex-row-reverse border-t">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg">Perbarui</button>
                <button type="button" @click="open = false" class="px-4 py-2 bg-white text-gray-700 ml-2 border rounded-lg">Batal</button>
            </div>
        </form>
    </x-form-modal>
</div>

{{-- =================== MODAL DELETE =================== --}}
<div x-data="{
    open: false,
    userId: null,
    userName: '',
    handleDispatch(e) {
        this.userId = e.detail.id;
        this.userName = e.detail.name;
        this.open = true;
    }
}" @delete-admin-modal.window="handleDispatch($event)">

    <x-delete-modal name="delete-admin-modal" title="🗑️ Hapus Admin" :message="false">
        
        <p class="text-sm text-gray-700 mb-4">
            Anda yakin ingin menghapus admin:
            <strong class="text-red-600" x-text="userName"></strong>?
        </p>

        <form :action="'/admin/admin/delete/' + userId" method="POST">
            @csrf
            @method('DELETE')

            <div class="bg-gray-50 p-4 sm:flex sm:flex-row-reverse border-t">
                <button class="px-4 py-2 bg-red-600 text-white rounded-lg">Hapus</button>
                <button type="button" @click="open = false" class="px-4 py-2 bg-white text-gray-700 ml-2 border rounded-lg">Batal</button>
            </div>
        </form>
    </x-delete-modal>
</div>

@endsection

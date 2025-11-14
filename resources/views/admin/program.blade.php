@extends('layouts.admin')

@section('title', 'Program Donasi')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Program Donasi</h1>
        {{-- TOMBOL TAMBAH PROGRAM (Pemicu/Dispatch Event) --}}
        <button @click="$dispatch('add-program-modal')" class="px-4 py-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition">
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
                    <th class="px-6 py-3 font-semibold">Status</th>
                    <th class="px-6 py-3 font-semibold">Target Donasi</th>
                    <th class="px-6 py-3 font-semibold">Terkumpul</th>
                    <th class="px-6 py-3 font-semibold">Deadline</th>
                    <th class="px-6 py-3 text-center font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($programs as $program)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">{{$loop->iteration}}</td>
                    <td class="px-6 py-4 font-semibold text-gray-800">{{$program->title}}</td>
                    <td class="px-6 py-4 @if($program->status == 'AKTIF') text-green-600 @else text-red-600 @endif">
                        {{$program->status}}
                    </td>
                    <td class="px-6 py-4 text-green-600 font-semibold">Rp {{number_format($program->target, 0, ',', '.')}}</td>
                    <td class="px-6 py-4 text-blue-600 font-semibold">Rp {{number_format($program->donation->where('status', 'Sukses')->sum('amount'), 0, ',', '.')}}</td>
                    <td class="px-6 py-4 text-gray-700">{{date('d M Y', strtotime($program->deadline))}}</td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">
                            {{-- Tombol Edit (Pemicu/Dispatch Event) --}}
                            <button 
                                @click="$dispatch('edit-program-modal{{ $program->program_id }}')" 
                                class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded-md text-sm"
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
                                        <input type="text" id="edit_nama" name="title" value="{{$program->title}}" required 
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                    </div>

                                    {{-- Target Donasi --}}
                                    <div>
                                        <label for="edit_target" class="block text-sm font-medium text-gray-700">Target Donasi (Rp)</label>
                                        <input type="number" id="edit_target" name="target" value="{{$program->target}}" required min="1000"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                    </div>

                                    {{-- Deadline --}}
                                    <div>
                                        <label for="edit_deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
                                        <input type="date" id="edit_deadline" name="deadline" value="{{$program->deadline}}" required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                    </div>
                                    
                                    {{-- Deskripsi --}}
                                    <div>
                                        <label for="edit_deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                        <textarea id="edit_deskripsi" name="description" rows="3"  required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">{{$program->description}}</textarea>
                                    
                                    </div>

                                    <div>
                                        <label for="add_status" class="block text-sm font-medium text-gray-700">Status</label>
                                        <select id="edit_status" name="status"  required
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                            <option value="AKTIF" @if($program->status == 'AKTIF') selected @endif>AKTIF</option>
                                            <option value="NONAKTIF" @if($program->status == 'NONAKTIF') selected @endif>NONAKTIF</option>
                                        </select>
                                    </div>

                                    <div>
                                        <label for="edit_banner" class="block text-sm font-medium text-gray-700">Gambar Poster</label>
                                        <input type="file" id="edit_banner" name="banner"
                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                                        <a href="{{asset($program->banner)}}" target="_blank">
                                            Preview Poster
                                        </a>
                                    </div>

                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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
                            <button @click="$dispatch('delete-program-modal{{ $program->program_id }}')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-sm">
                                Hapus
                            </button>
                            @endif
                            <x-delete-modal name="delete-program-modal{{ $program->program_id }}" title="🗑️ Hapus Program" message="Anda akan menghapus Program 'Bantuan Panti Asuhan'. Tindakan ini tidak dapat dibatalkan.">
                                <form action="{{route('admin.program.delete', $program->program_id)}}" method="POST">
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
        <form action="{{route('admin.program.create')}}" method="POST" class="space-y-4" enctype="multipart/form-data">
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

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
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
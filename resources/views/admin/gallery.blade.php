@extends('layouts.admin')

@section('title', 'Data Galeri')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-blue-900">Galeri Kegiatan</h1>
        
        {{-- TOMBOL TAMBAH GALERI (Pemicu Modal) --}}
        <button @click="$dispatch('add-gallery-modal')" class="px-4 py-2 bg-blue-700 text-white rounded-lg font-semibold hover:bg-blue-800 transition shadow-lg">
            + Tambah Galeri
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

        @foreach($galleries as $gallery)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden transition duration-300 hover:shadow-xl">
            <img 
                src="{{asset($gallery->banner)}}" 
                alt="{{$gallery->title}}" 
                class="w-full h-40 object-cover"
                onerror="this.onerror=null;this.src='https://placehold.co/600x400';"
            >
            <div class="p-4 space-y-3">
                <h3 class="text-sm font-bold text-gray-800 ">{{$gallery->title}}</h3>
                
                {{-- Tombol Aksi --}}
                <div class="flex justify-end">
                    <button 
                        @click="$dispatch('delete-gallery-modal{{ $gallery->gallery_id }}')" 
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-lg text-sm transition shadow-md w-full">
                        Hapus
                    </button>
                    <x-delete-modal name="delete-gallery-modal{{ $gallery->gallery_id }}" title="🗑️ Hapus gallery" message="Anda akan menghapus gallery 'Bantuan Panti Asuhan'. Tindakan ini tidak dapat dibatalkan.">
                        <form action="{{route('admin.gallery.delete', $gallery->gallery_id)}}" method="POST">
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
            </div>
        </div>
        @endforeach

        @if($galleries->isEmpty())
            <p class="text-secondary">Belum ada galeri kegiatan.</p>
        @endif
        
    </div>
    
    <x-form-modal name="add-gallery-modal" title="+ Upload Foto Galeri">
        <form action="{{ route('admin.gallery.create') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
            @csrf
            {{-- Nama Kegiatan --}}
            <div>
                <label for="add_nama" class="block text-sm font-medium text-gray-700">Nama/Judul Kegiatan</label>
                <input type="text" id="add_nama" name="title" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
            </div>

            {{-- Upload Gambar --}}
            <div>
                <label for="add_image" class="block text-sm font-medium text-gray-700">Pilih Foto Kegiatan</label>
                <input type="file" id="add_image" accept=".jpg,.jpeg,.png" name="banner" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border">
                <p class="mt-1 text-xs text-gray-500">Maksimal ukuran file 2MB (JPG/PNG).</p>
            </div>
            
            {{-- TOMBOL SUBMIT DAN BATAL --}}
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse -mx-4 -mb-4 sm:-mx-6 sm:-mb-6 rounded-b-xl">
                <button type="submit"
                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                    Upload Galeri
                </button>
                {{-- Tombol Batal/Kembali --}}
                <button type="button" @click="open = false"
                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </form>
    </x-form-modal>


@endsection
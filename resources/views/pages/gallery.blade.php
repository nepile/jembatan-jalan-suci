@extends('layouts.page')

@section('title', 'Galeri Kegiatan | Donasi Yauma')

@section('content')

    <div class="container my-5">
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="fw-bold secondary-color">Galeri Kegiatan Panti Asuhan</h1>
                <p class="text-muted">Kenang momen-momen kebahagiaan bersama.</p>
            </div>
        </div>

        {{-- Grid Galeri --}}
        <div class="row g-4">
            @foreach ($galleries as $item)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="{{ asset($item->banner) }}" data-lightbox="galeri" data-title="{{ $item->title }}">
                        <div class="card border-0 shadow-sm overflow-hidden h-100">
                            <img src="{{ asset($item->banner) }}" alt="{{ $item->title }}"
                                class="w-100 h-100 object-fit-cover" loading="lazy">
                            <div class="card-img-overlay d-flex align-items-end p-2 bg-dark bg-opacity-50 text-white">
                                <span class="small fw-bold">{{ $item->title }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            @if ($galleries->isEmpty())
                <div class="col-12 bg-light text-secondary text-center p-4 rounded-3">
                    Belum ada kegiatan galeri.
                </div>
            @endif
        </div>

        {{-- Tombol Kembali --}}
        <div class="text-center mt-5">
            <a href="{{ route('pages.home') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>

@endsection

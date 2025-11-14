@extends('layouts.page')

@section('title', 'Galeri Kegiatan | Donasi Yauma')

@section('content')

<div class="container my-5">
  <div class="row mb-4">
    <div class="col text-center">
      <h1 class="fw-bold secondary-color">Galeri Kegiatan Panti Asuhan</h1>
      <p class="text-muted">Kenang momen-momen kebahagiaan bersama anak-anak yatim dan dhuafa.</p>
    </div>
  </div>

  {{-- Grid Galeri --}}
  <div class="row g-4">
    @php
      $galleryItems = [
        ['src' => 'image copy.png', 'title' => 'Kegiatan Belajar Bersama'],
        ['src' => 'image copy 2.png', 'title' => 'Permainan Outdoor'],
        ['src' => 'image copy 3.png', 'title' => 'Acara Maulid Nabi'],
        ['src' => 'image copy 4.png', 'title' => 'Buka Puasa Bersama'],
        ['src' => 'image.png', 'title' => 'Foto Bersama Anak-Anak'],
        ['src' => 'image copy.png', 'title' => 'Donasi Buku'],
        ['src' => 'image copy 2.png', 'title' => 'Kunjungan Relawan'],
        ['src' => 'image copy 3.png', 'title' => 'Pembagian Hadiah'],
      ];
    @endphp

    @foreach($galleryItems as $item)
      <div class="col-6 col-md-4 col-lg-3">
        <a href="{{ asset('images/' . $item['src']) }}" data-lightbox="galeri" data-title="{{ $item['title'] }}">
          <div class="card border-0 shadow-sm overflow-hidden h-100">
            <img 
              src="{{ asset('images/' . $item['src']) }}" 
              alt="{{ $item['title'] }}" 
              class="w-100 h-100 object-fit-cover"
              loading="lazy"
            >
            <div class="card-img-overlay d-flex align-items-end p-2 bg-dark bg-opacity-50 text-white">
              <span class="small fw-bold">{{ $item['title'] }}</span>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>

  {{-- Tombol Kembali --}}
  <div class="text-center mt-5">
    <a href="{{ route('pages.home') }}" class="btn btn-outline-secondary">
      <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
    </a>
  </div>
</div>

@endsection
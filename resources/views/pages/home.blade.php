@extends('layouts.page')

@section('title', 'Beranda | Donasi Yauma')

@section('content')

{{-- Menambahkan Style Dasar untuk Warna --}}
<style>
  .primary-bg-color {
    background-color: #005cbf; /* Biru Gelap sesuai Header/Footer */
    color: white;
  }
  .secondary-color {
    color: #005cbf;
  }
  .btn-primary {
    background-color: #005cbf;
    border-color: #005cbf;
  }
  .btn-primary:hover {
    background-color: #004a9e;
    border-color: #004a9e;
  }
  .hero-section {
    position: relative;
    height: 60vh;
    background: url('{{ asset("images/home.jpeg") }}') center center / cover no-repeat;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    padding: 50px 0;
  }

  .hero-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.3));
    z-index: 0;
 }

 .galeri-img {
    transition: transform 0.3s ease, opacity 0.3s ease;
 }
 .galeri-img:hover {
    transform: scale(1.05);
    opacity: 0.95;
 }
</style>

{{-- Bagian Hero Section (Konten Utama) --}}
<section class="hero-section">
  <div class="container">
    <div class="hero-content position-relative">
      {{-- Overlay untuk meningkatkan kontras --}}
      <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark" style="opacity: 0.4;"></div>

      <div class="position-relative z-1 text-white text-center">
        <h1 class="fw-bold mb-3 display-4">Panti Asuhan Jembatan Jalan Suci</h1>
        <p class="mb-4 lead">
          Uluran tangan Anda adalah jembatan menuju masa depan cerah bagi anak-anak yatim dan dhuafa. <br>
          Mari berbagi kebahagiaan bersama kami.
        </p>
        <div class="d-flex justify-content-center gap-3">
          <a href="{{ route('pages.donation-program') }}" class="btn btn-primary fw-bold btn-lg">Program Donasi</a>
          <a href="{{ route('pages.general-donation') }}" class="btn btn-outline-light fw-bold btn-lg">Donasi Umum</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container-fluid my-5">

  {{-- Bagian Program Unggulan --}}
  <div class="container">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold secondary-color">Program Donasi Pilihan</h2>
        <p class="text-muted">Dukung program-program terbaik kami untuk masa depan mereka.</p>
      </div>
    </div>

    {{-- Dummy Card Program --}}
    <div class="row g-4 mb-5">
      @php
        $programImages = [
          'image copy.png',
          'image copy 2.png',
          'image copy 3.png'
        ];
      @endphp

      @for ($i = 0; $i < 3; $i++)
      <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
          <img src="{{ asset('images/' . $programImages[$i]) }}" class="card-img-top object-fit-cover" alt="Program {{ $i + 1 }}">
          <div class="card-body">
            <h5 class="card-title fw-bold secondary-color">Beasiswa Pendidikan Anak Yatim</h5>
            <p class="card-text text-muted">Program ini bertujuan untuk menjamin akses pendidikan formal dan informal bagi anak-anak di panti.</p>
            <a href="{{ route('pages.donation-detail') }}" class="btn btn-sm btn-outline-primary">Donasi Sekarang</a>
          </div>
        </div>
      </div>
      @endfor
    </div>

    <div class="text-center mt-4">
      <a href="{{ route('pages.donation-program') }}" class="btn btn-lg btn-warning fw-bold text-white shadow-sm">Lihat Semua Program</a>
    </div>
  </div>
  
  {{-- Separator --}}
  <div class="py-4"></div>

  {{-- Bagian Tentang Kami (Background Biru) --}}
  <div class="container-fluid py-5 primary-bg-color">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 p-4">
          <h2 class="mb-4 fw-bold">Tentang Yayasan Umat Mandiri Nusantara</h2>
          <p class="mb-4">
            Yayasan Umat Mandiri Nusantara (Panti Yauma) merupakan organisasi **nirlaba** yang bergerak di bidang sosial dan pendidikan sebagai fasilitator antara kaum **aghniya dan dhuafa**. Kami berdedikasi untuk memberikan bimbingan, pendidikan, dan kasih sayang.
          </p>
          <a href="{{ route('pages.about-us') }}" class="btn btn-light fw-bold">Selengkapnya</a>
        </div>
        <div class="col-lg-6 d-none d-lg-block">
          <img src="{{ asset('images/image copy 4.png') }}" class="img-fluid rounded shadow-lg" alt="Visi Misi">
        </div>
      </div>
    </div>
  </div>

  {{-- Separator --}}
  <div class="py-4"></div>

  {{-- Bagian Galeri Kegiatan --}}
<div class="container">
  <div class="row mb-4">
    <div class="col text-center">
      <h2 class="fw-bold secondary-color">Momen Kebersamaan</h2>
      <p class="text-muted">Lihat kegiatan sehari-hari anak-anak di panti.</p>
    </div>
  </div>
  
  <div class="row g-3">
        @php
        $galleryImages = [
            'image copy.png',
            'image copy 2.png',
            'image copy 3.png',
            'image copy 4.png'
        ];
        @endphp

        @foreach($galleryImages as $image)
        <div class="col-6 col-md-3">
            <div class="overflow-hidden rounded shadow-sm" style="height: 200px;">
            <img 
                src="{{ asset('images/' . $image) }}" 
                alt="Galeri" 
                class="w-100 h-100 object-fit-cover"
                loading="lazy"
            >
            </div>
        </div>
        @endforeach
        {{-- Tombol menuju halaman galeri lengkap --}}
        <div class="text-center mt-4">
            <a href="{{ route('pages.gallery') }}" class="btn btn-primary fw-bold px-4 py-2">
                Lihat Galeri
            </a>
        </div>
    </div>
 </div>

</div>
@endsection
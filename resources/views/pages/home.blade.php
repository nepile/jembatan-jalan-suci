@extends('layouts.page')

@section('title', 'Beranda')

@section('content')

    {{-- Menambahkan Style Dasar untuk Warna --}}
    <style>
        .primary-bg-color {
            background-color: #005cbf;
            /* Biru Gelap sesuai Header/Footer */
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
            background: url('{{ asset('images/home.jpeg') }}') center center / cover no-repeat;
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
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.3));
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
                        Tangan Anda adalah Jembatan Emas menuju masa depan para Bintang. <br> Bersama kami, Anda adalah
                        Arsitek Takdir. Mari berbagi Energi Bahagia ini.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('pages.donation-program') }}" class="btn btn-primary fw-bold btn-lg">Program
                            Donasi</a>
                        <a href="{{ route('pages.about-us') }}" class="btn btn-outline-light fw-bold btn-lg">Tentang
                            Kami</a>
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

            <div class="row g-4 mb-5">
                @foreach ($programs as $program)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ asset($program->banner) }}" class="card-img-top object-fit-cover"
                                alt="Program {{ $program->title }}"
                                onerror="this.onerror=null;this.src='https://placehold.co/600x400';">
                            <div class="card-body">
                                <h5 class="card-title fw-bold secondary-color">{{ $program->title }}</h5>
                                <p class="card-text text-muted">
                                    {{ $program->description }}
                                </p>
                                <a href="{{ route('pages.donation-detail', $program->slug) }}"
                                    class="btn btn-sm btn-outline-primary">Donasi
                                    Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($programs->isEmpty())
                    <div class="col-12 bg-light text-secondary text-center p-4 rounded-3">
                        Belum ada program donasi.
                    </div>
                @endif
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('pages.donation-program') }}"
                    class="btn btn-lg btn-warning fw-bold text-white shadow-sm">Lihat Semua Program</a>
            </div>
        </div>

        {{-- Separator --}}
        <div class="py-4"></div>

        {{-- Bagian Tentang Kami (Background Biru) --}}
        <div class="container-fluid py-5 primary-bg-color">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 p-4">
                        <h2 class="mb-4 fw-bold">Tentang Panti Asuhan Jembatan Jalan Suci</h2>
                        <p class="mb-4">
                            Panti Asuhan Jembatan Jalan Suci adalah sebuah lembaga sosial yang berdedikasi untuk memberikan
                            perlindungan, pendidikan, dan kasih sayang kepada anak-anak yatim, piatu, dan anak-anak kurang
                            mampu. Berdiri dengan misi membangun masa depan yang lebih baik bagi generasi muda, panti asuhan
                            ini tidak hanya menyediakan kebutuhan dasar seperti tempat tinggal, makan, dan pakaian, tetapi
                            juga menekankan pada pendidikan formal dan pengembangan karakter.
                        </p>
                        <a href="{{ route('pages.about-us') }}" class="btn btn-light fw-bold">Selengkapnya</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block">
                        <img src="{{ asset('images/aboutus.jpeg') }}" class="img-fluid rounded shadow-lg"
                            alt="Tentang Kami">
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
                @foreach ($galleries as $image)
                    <div class="col-6 col-md-3">
                        <div class="overflow-hidden rounded shadow-sm" style="height: 200px;">
                            <img src="{{ asset($image->banner) }}" alt="Galeri" class="w-100 h-100 object-fit-cover"
                                loading="lazy">
                        </div>
                    </div>
                @endforeach
                @if ($galleries->isEmpty())
                    <div class="col-12 bg-light text-secondary text-center p-4 rounded-3">
                        Belum ada kegiatan galeri.
                    </div>
                @endif
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

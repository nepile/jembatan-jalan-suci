@extends('layouts.page')

@section('title', 'Tentang Kami | Yauma')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold mb-3">Jembata Jalan Suci</h1>
                    <h2 class="h4 mb-4">Rumah Kasih untuk Anak Yatim & Dhuafa</h2>
                    <p class="lead mb-4">
                        Kami adalah panti asuhan yang berdedikasi memberikan tempat tinggal, pendidikan, dan kasih sayang
                        kepada anak-anak yatim dan dhuafa.
                        Setiap senyummu adalah harapan bagi mereka.
                    </p>
                    <a href="/donasi" class="btn btn-primary btn-lg px-5 rounded-pill fw-bold shadow">
                        Donasi Sekarang
                    </a>
                </div>
                <div class="col-lg-6 text-center mt-4 mt-lg-0">
                    <img src="{{ asset('images/image.png') }}" alt="Anak-anak panti asuhan"
                        class="img-fluid rounded-3 shadow-lg" style="max-height: 380px; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6">
                    <div class="text-center p-4">
                        <div class="bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-eye-fill text-white fs-2"></i>
                        </div>
                        <h3 class="h4 fw-bold">Visi Kami</h3>
                        <p class="text-muted">
                            Menjadi panti asuhan teladan yang mencetak generasi berakhlak mulia, mandiri, dan berprestasi.
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center p-4">
                        <div class="bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-heart-fill text-white fs-2"></i>
                        </div>
                        <h3 class="h4 fw-bold">Misi Kami</h3>
                        <p class="text-muted">
                            Memberikan pendidikan berkualitas, pembinaan agama, kesehatan, dan kasih sayang seperti keluarga
                            sendiri.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section class="bg-light py-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-primary">50+</h2>
                    <p class="text-muted">Anak Asuh</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-primary">15</h2>
                    <p class="text-muted">Tahun Berdiri</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-primary">100%</h2>
                    <p class="text-muted">Lulusan Melanjutkan</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-primary">638</h2>
                    <p class="text-muted">Donatur Setia</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tim Pengurus -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Pengurus Panti Asuhan</h2>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Ust. Ahmad"
                            class="rounded-circle mb-3" width="120">
                        <h5 class="fw-bold">Ust. Ahmad Fauzi</h5>
                        <p class="text-primary">Pimpinan Panti</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Bu Siti"
                            class="rounded-circle mb-3" width="120">
                        <h5 class="fw-bold">Siti Nurhaliza, S.Pd</h5>
                        <p class="text-primary">Pengajar & Pembina</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="bg-primary text-white py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold">Apa Kata Mereka?</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="bg-white text-dark p-4 rounded-3 shadow-sm">
                        <p class="mb-3">
                            <em>"Alhamdulillah, berkat Yauma, saya bisa melanjutkan sekolah hingga lulus SMA. Semoga Allah
                                balas kebaikan para donatur."</em>
                        </p>
                        <p class="fw-bold mb-0 text-end">— Rudi, Alumni 2023</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="bg-white text-dark p-4 rounded-3 shadow-sm">
                        <p class="mb-3">
                            <em>"Anak-anak di sini sangat bahagia. Mereka seperti keluarga saya sendiri. Terima kasih atas
                                amanahnya."</em>
                        </p>
                        <p class="fw-bold mb-0 text-end">— Bu Siti, Pengasuh</p>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

{{-- Tambahkan Bootstrap Icons di layout atau di sini --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endpush

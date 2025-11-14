@extends('layouts.page')

@section('title', 'Jembatan Jalan Suci')

@section('content')
    <!-- Hero Section -->
    <section class="bg-primary text-white py-5 rounded">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="p-4 p-md-5">
                        <h2 class="display-7 fw-bold mb-3">Jembatan Jalan Suci</h2>
                        <div class="bg-white text-dark p-3 rounded shadow-sm">
                            <p class="mb-2"><strong>Nama:</strong> Panti Asuhan Jembatan Jalan Suci</p>
                            <p class="mb-2"><strong>Alamat:</strong> Jln Jemadi Gg Kelapa III No 57, Kel. Pulo Brayan Darat
                                II, Medan Timur, Kota Medan</p>
                            <p class="mb-2"><strong>Berdiri:</strong> 2021</p>
                            <p class="mb-2"><strong>Anak Asuh:</strong> 38 orang</p>
                            <p class="mb-2"><strong>Pengurus:</strong> 6 orang</p>
                            <p class="mb-3"><strong>Rekening Donasi:</strong><br>
                                <small>BCA: 8205409331 a.n. Relahati Laia<br>
                                    BRI: 108401003140535 a.n. Yayasan Jembatan Jalan Suci</small>
                            </p>
                        </div>
                        <a href="/donasi" class="btn btn-warning btn-lg px-5 rounded-pill fw-bold shadow mt-4">
                            Donasi Sekarang
                        </a>
                    </div>
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
                    <h2 class="display-5 fw-bold text-primary">38</h2>
                    <p class="text-muted">Anak Asuh</p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-primary">4</h2>
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
            <h2 class="text-center text-primary mb-5 fw-bold">Struktur Pengurus Panti Asuhan</h2>
            <div class="row justify-content-center mt-4 mt-lg-0">
                <div class="col-lg-6 text-center">
                    <div class="text-center">
                        <div class="mx-auto mb-4" style="width: 500px; height: 500px;">
                            <img src="{{ asset('images/pengurus.jpeg') }}" alt="Ust. Ahmad Fauzi"
                                class="img-fluid w-100 h-100"
                                style="object-fit: cover; border: 4px solid #ddd; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Lokasi Panti Asuhan -->
    <section class="bg-white py-5">
        <div class="container">
            <h2 class="text-center mb-5 fw-bold text-primary">Lokasi Panti Asuhan Jembatan Jalan Suci</h2>

            <!-- Google Maps Iframe - Responsif -->
            <div class="ratio ratio-16x9 rounded-3 shadow-lg overflow-hidden mb-4"
                style="max-height: 500px; border: 3px solid #e9ecef;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1912.9710819736367!2d98.6781490475374!3d3.6275689968155613!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303133ff2f13f061%3A0x588cf3a606dc7bb6!2sJl.%20Jemadi%20Gg.%20Klp.%20III%20No.57%2C%20Pulo%20Brayan%20Darat%20II%2C%20Kec.%20Medan%20Tim.%2C%20Kota%20Medan%2C%20Sumatera%20Utara%2020237!5e0!3m2!1sid!2sid!4v1763145149933!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

            <!-- Info & Tombol -->
            <div class="text-center">
                <h5 class="fw-bold">Panti Asuhan Jembatan Jalan Suci</h5>
                <p class="text-muted mb-3">
                    Jln Jemadi Gg Kelapa III No 57<br>
                    Kel. Pulo Brayan Darat II, Medan Timur, Kota Medan
                </p>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="https://maps.google.com/?q=3.627569,98.680337" target="_blank"
                        class="btn btn-success btn-sm px-4">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
    </section>
@endsection

{{-- Bootstrap Icons --}}
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
@endpush

{{-- Script Geolocation --}}
@push('scripts')
    <script>
        function getMyDirection() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(pos => {
                    const lat = pos.coords.latitude;
                    const lng = pos.coords.longitude;
                    window.open(`https://maps.google.com/?saddr=${lat},${lng}&daddr=3.627569,98.680337`, '_blank');
                }, () => {
                    alert('Izinkan akses lokasi untuk petunjuk arah otomatis.');
                });
            } else {
                alert('Browser tidak mendukung geolocation.');
            }
        }
    </script>
@endpush

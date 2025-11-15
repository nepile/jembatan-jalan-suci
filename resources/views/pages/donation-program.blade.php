@extends('layouts.page')

@section('title', 'Program Donasi')

@section('content')

    <x-banner />
    <section class="stats-section">
        <div class="container">
            <div class="stats-container">
                <div class="stats-card">
                    <div class="stats-number">{{ $donationProgramTotal }}</div>
                    <div class="stats-label">Program Donasi</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number">Rp {{ number_format($donationTotal, 0, ',', '.') }}</div>
                    <div class="stats-label">Total Donasi Terkumpul</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number">{{ $donaturTotal }}</div>
                    <div class="stats-label">Total Donatur</div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col">
            <div class="text-center">
                <h1>Selamat Datang di Donasi Yauma</h1>
                <p>Donasi Anda Selamatkan Mereka</p>
            </div>
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
@endsection

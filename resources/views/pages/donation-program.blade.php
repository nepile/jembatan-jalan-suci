@extends('layouts.page')

@section('title', 'Program Donasi')

@section('content')

    <x-banner />
    <section class="stats-section">
        <div class="container">
            <div class="stats-container">
                <div class="stats-card">
                    <div class="stats-number">45</div>
                    <div class="stats-label">Program Donasi</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number">Rp 565.678.908</div>
                    <div class="stats-label">Total Donasi Terkumpul</div>
                </div>
                <div class="stats-card">
                    <div class="stats-number">638</div>
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
@endsection

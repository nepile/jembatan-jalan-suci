@extends('layouts.page')

@section('title', 'Donasi')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .invoice-card {
            max-width: 760px;
            margin: 40px auto;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            background: white;
            padding: 30px;
        }

        .bank-logo {
            width: 70px;
            height: auto;
        }

        .section-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-top: 25px;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 6px;
        }

        .info-box {
            background: #f1f3f5;
            padding: 12px 15px;
            border-radius: 8px;
        }
    </style>
    <div class="invoice-card">
        <x-alert />

        <h3 class="text-center fw-bold mb-3">Invoice Pembayaran Donasi</h3>
        <p class="text-center text-muted mb-4">Harap selesaikan pembayaran sebelum batas waktu yang ditentukan.</p>

        <!-- Informasi Bank dan Virtual Account -->
        <div class="d-flex align-items-center justify-content-between info-box mb-3">
            <div class="d-flex align-items-center">
                <img src="{{ asset('images/bank/' . $donation->bank . '_va.png') }}" class="bank-logo me-3" alt="Bank Logo" />
                <div>
                    <div class="fw-semibold">Bank {{ strtoupper($donation->bank) }}</div>
                    <div class="text-muted small">Virtual Account</div>
                </div>
            </div>
            <div class="text-end">
                <div class="fw-bold fs-5">{{ $donation->va_number }}</div>
            </div>
        </div>

        <!-- Expired -->
        <div class="section-title">Batas Waktu Pembayaran</div>
        <div class="info-box mb-4">
            <span class="fw-bold text-danger">{{ $donation->expiry_time }}</span>
        </div>

        <!-- Order Info -->
        <div class="section-title">Informasi Pesanan</div>
        <table class="table table-borderless mb-3">
            <tbody>
                <tr>
                    <td class="text-muted">No. Invoice</td>
                    <td class="fw-semibold">{{ $donation->order_id }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Jenis Donasi</td>
                    <td>{{ $donation->program->title }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Metode Pembayaran</td>
                    <td>Virtual Account {{ strtoupper($donation->bank) }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Status Pembayaran</td>
                    <td>
                        <span
                            class="@if ($donation->status == 'Sukses') bg-success-subtle text-success @elseif($donation->status == 'Menunggu') bg-warning-subtle @else bg-danger-subtle text-danger @endif px-2 rounded">
                            {{ $donation->status }}
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Donatur -->
        <div class="section-title">Detail Donatur</div>
        <table class="table table-borderless mb-3">
            <tbody>
                <tr>
                    <td class="text-muted">Nama Donatur</td>
                    <td>{{ $donation->full_name }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Email</td>
                    <td>{{ $donation->email }}</td>
                </tr>
                <tr>
                    <td class="text-muted">Nomor HP</td>
                    <td>{{ $donation->phone_number }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Jumlah Pembayaran -->
        <div class="section-title">Jumlah Pembayaran</div>
        <div class="info-box">
            <div class="d-flex justify-content-between">
                <span class="fw-semibold">Total yang harus dibayarkan</span>
                <span class="fw-bold fs-4 text-success">Rp {{ number_format($donation->amount, 0, ',', '.') }}</span>
            </div>
        </div>

        <p class="text-center mt-4 small text-muted">Setelah melakukan pembayaran, invoice akan dikonfirmasi otomatis
            dalam 1–5 menit.</p>

    </div>

@endsection

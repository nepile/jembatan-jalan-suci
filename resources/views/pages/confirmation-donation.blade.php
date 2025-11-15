@extends('layouts.page')

@section('title', 'Konfirmasi Donasi')

@section('content')
    <style>
        body {
            background: #f0f4f8;
        }

        .invoice-section {
            padding: 60px 0;
        }

        .invoice-card {
            border-radius: 18px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }

        .invoice-header {
            background: #005c99;
            color: white;
            padding: 25px 30px;
            border-radius: 18px 18px 0 0;
        }

        .invoice-header h3 {
            margin: 0;
            font-weight: 600;
            letter-spacing: .5px;
        }
    </style>

    <div class="container invoice-section">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <x-alert />

                <div class="card invoice-card">
                    <div class="invoice-header text-center">
                        <h3><i class="bi bi-receipt-cutoff me-2"></i> Cek No. Invoice</h3>
                        <p class="mt-1 mb-0">Masukkan nomor invoice untuk melihat detail pembayaran donasi Anda.</p>
                    </div>

                    <div class="card-body p-4">

                        <form action="{{ route('pages.confirmation-donation.search') }}" method="GET">
                            <div class="mb-4">
                                <label class="form-label fw-semibold">No. Invoice</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-white">
                                        <i class="bi bi-hash text-primary"></i>
                                    </span>
                                    <input type="text" class="form-control" required placeholder="Masukkan No. Invoice"
                                        name="order_id">
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-search me-2"></i> Cek Invoice
                                </button>
                            </div>

                        </form>

                    </div>
                </div>

                <!-- Info tambahan -->
                <div class="text-center mt-4">
                    <p class="text-muted mb-1">Jika anda belum pernah mendonasikan, anda dapat mendonasikannya melalui link
                        di bawah ini.</p>
                    <a href="{{ route('pages.donation-program') }}" class="btn btn-outline-primary btn-sm">
                        Lihat Program Donasi
                    </a>
                </div>

            </div>
        </div>
    </div>

@endsection

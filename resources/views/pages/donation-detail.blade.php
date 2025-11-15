@extends('layouts.page')

@section('title', 'Detail Program Donasi')

@section('content')
    <style>
        .campaign-header {
            background: url('https://via.placeholder.com/1200x400') center/cover no-repeat;
            border-radius: 1rem;
            height: 400px;
            position: relative;
        }

        .campaign-title {
            font-weight: 700;
            font-size: 1.8rem;
        }

        .donation-card {
            border-radius: 1rem;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .progress-circle {
            --value: 0;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background:
                conic-gradient(#ff7f00 calc(var(--value) * 1%),
                    #e6e6e6 0);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            font-weight: bold;
            color: #ff7f00;
            margin: 0 auto;
        }


        /* Tombol Donasi */
        .btn-donate {
            background: linear-gradient(135deg, #ff7f00, #ff9f40);
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 50px;
            padding: 10px 30px;
            box-shadow: 0 6px 15px rgba(255, 127, 0, 0.3);
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-donate:hover {
            background: linear-gradient(135deg, #e96f00, #ff8c1a);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255, 127, 0, 0.4);
        }
    </style>
    <div class="container py-5">
        <div class="row g-4">
            <!-- Kolom Kiri -->
            <div class="col-lg-8">
                <div class="card border-0">
                    <div class="campaign-header d-flex align-items-end justify-content-center text-white">
                        <img src="{{ asset($program->banner) }}" class="h-100 w-100 object-fit-cover rounded" alt=""
                            onerror="this.onerror=null;this.src='https://placehold.co/600x400';">
                    </div>

                    <div class="card-body">
                        <h4 class="campaign-title mt-3">{{ $program->title }}</h4>
                        <ul class="nav nav-tabs mt-3" id="campaignTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="detail-tab" data-bs-toggle="tab"
                                    data-bs-target="#detail" type="button" role="tab">Detail Campaign</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="donatur-tab" data-bs-toggle="tab" data-bs-target="#donatur"
                                    type="button" role="tab">Daftar Donatur</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3" id="campaignTabsContent">
                            <div class="tab-pane fade show active" id="detail" role="tabpanel">
                                <p>
                                    {{ $program->description }}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="donatur" role="tabpanel">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tanggal</th>
                                            <th>Donatur</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donaturs as $donatur)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $donatur->created_at }}</td>
                                                <td>{{ $donatur->full_name }}</td>
                                                <td>Rp {{ number_format($donatur->amount, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                        @if ($donaturs->isEmpty())
                                            <p class="text-secondary">Belum ada donatur.</p>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @php
                $today = \Carbon\Carbon::now();
                $future = \Carbon\Carbon::parse($program->deadline);
                $collectedDonation = $program->donation->where('status', 'Sukses')->sum('amount');
                $percentage = ($collectedDonation / $program->target) * 100;
                $percentage = $percentage > 100 ? 100 : $percentage;
            @endphp
            <!-- Kolom Kanan -->
            <div class="col-lg-4">
                <div class="card donation-card p-4">
                    <div class="text-center bg-light rounded-5 mb-4 p-3">
                        <div class="progress-circle mb-3 text-dark" style="--value: {{ $percentage }};">
                            {{ number_format($percentage, 0) }}%
                        </div>
                        <p class="mb-1">Donasi Terkumpul:</p>
                        <h5 class="fw-bold mb-2">Rp
                            {{ number_format($collectedDonation, 0, ',', '.') }}
                        </h5>
                        <p class="text-muted small">dari target donasi Rp
                            {{ number_format($program->target, 0, ',', '.') }}
                        </p>
                        <p class="mb-1">Sisa Waktu:</p>
                        <h5 class="fw-bold text-danger mb-3">{{ ceil($today->diffInDays($future)) }} Hari</h5>
                    </div>

                    <div class="d-grid">

                        <a href="{{ route('pages.donation-bank', $program->slug) }}" class="d-block text-decoration-none">
                            <button class="btn btn-donate btn-lg px-5 w-100">Donasi Sekarang</button>
                        </a>
                    </div>

                    <p class="text-center mt-3 text-muted small mb-0">Bantu Sebarkan Campaign ini:</p>

                    <input type="text" id="copyLink" class="form-control" value="{{ url()->current() }}" readonly>

                    <button class="btn btn-primary mt-2" onclick="copyToClipboard()">
                        Copy Link
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

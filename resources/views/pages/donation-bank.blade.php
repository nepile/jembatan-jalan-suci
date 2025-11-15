@extends('layouts.page')

@section('title', 'Formulir Donasi')

@section('content')
    <style>
        .h-1 {
            height: 8%;
        }

        /* Garis tebal 4px */
        .progress-bg,
        .progress-active {
            border-radius: 8px;
        }
    </style>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Progress Step: Step 2 Aktif -->
                <div class="d-flex justify-content-between align-items-end mb-5 position-relative">
                    <div class="text-center">
                        <div class="rounded-circle mt-4 bg-warning text-white d-flex align-items-center justify-content-center mx-auto mb-2"
                            style="width: 40px; height: 40px;">1</div>
                        <small class="text-muted">Program Donasi</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mx-auto mb-2"
                            style="width: 40px; height: 40px;">2</div>
                        <small class="text-success fw-bold">Formulir</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto mb-2"
                            style="width: 40px; height: 40px;">3</div>
                        <small class="text-muted">Pembayaran</small>
                    </div>
                    <!-- Garis Latar Belakang (Kuning Penuh) -->
                    <div class="progress-bg position-absolute top-50 start-0 w-100 h-1 bg-warning"
                        style="z-index: -1; transform: translateY(-50%);"></div>

                    <!-- Garis Progres (Hijau sampai Step 2) -->
                    <div class="progress-active position-absolute top-50 start-0 h-1 bg-success"
                        style="z-index: -1; transform: translateY(-50%); width: 50%; transition: width 0.4s ease;"></div>
                </div>

                <form action={{ route('midtrans.payment', $program->program_id) }} method="post" class="row g-5">
                    @csrf
                    <!-- Profil Donatur -->
                    <div class="col-lg-6">
                        <h4 class="mb-4">Profil Donatur</h4>
                        <div class="row g-3">
                            <div class="col-12">
                                <label>Sapaan <span class="text-danger">*</span></label>
                                <select class="form-select" name="honorary_call" required>
                                    <option>Bapak</option>
                                    <option>Ibu</option>
                                    <option>Saudara</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Nama lengkap" name="full_name"
                                    required>
                            </div>
                            <div class="col-12">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="email@contoh.com" name="email"
                                    required>
                            </div>
                            <div class="col-12">
                                <label>No. Telpon <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="08xxxxxxxxxx" name="phone_number"
                                    required>
                            </div>
                            <div class="col-12">
                                <label>Doa & Harapan (opsional)</label>
                                <textarea class="form-control" rows="3" placeholder="Tuliskan doa..." name="hope"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Bank & Ringkasan -->
                    <div class="col-lg-6">
                        <h4 class="mb-4">Jumlah & Metode Pembayaran <span class="text-danger">*</span></h4>

                        <!-- Scrollable Bank List -->
                        <div class="border rounded p-3 mb-4" style="max-height: 400px; overflow-y: auto;">
                            <div class="form-check mb-3">
                                <label class="form-check-label fw-bold" for="bank">Jumlah Donasi</label>
                            </div>

                            <div class="row g-2">
                                <div class="col-12">
                                    <div class="mb-4 border border-warning rounded">
                                        <input type="text" id="rupiah" class="form-control" placeholder="Rp 0"
                                            required name="amount">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="border rounded p-3"
                            style="max-height: 400px; overflow-y: auto; background-color: #f8f9fa;">
                            <div class="form-check mb-3">
                                <label class="form-check-label fw-bold" for="bank">Bank Transfer (Kode Unik)</label>
                            </div>

                            <div class="row g-2">
                                @php
                                    $banks = [
                                        [
                                            'name' => 'BCA',
                                            'logo' => 'images/bank/bca_va.png',
                                        ],
                                        [
                                            'name' => 'BRI',
                                            'logo' => 'images/bank/bri_va.png',
                                        ],
                                    ];
                                @endphp

                                @foreach ($banks as $index => $bank)
                                    <div class="col-12">
                                        <div class="form-check border rounded p-3 mb-2 hover-shadow transition bg-white">
                                            <input class="form-check-input mt-2" type="radio" name="bank"
                                                id="bank-{{ $index }}" value="{{ $bank['name'] }}" required>
                                            <label class="form-check-label d-flex align-items-center cursor-pointer w-100"
                                                for="bank-{{ $index }}">
                                                <img src="{{ asset($bank['logo']) }}" alt="{{ $bank['name'] }}"
                                                    class="me-3" style="height: 28px; width: auto;">
                                                <span class="fw-medium">{{ $bank['name'] }}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>



                    <!-- Ringkasan -->
                    <div class="bg-light rounded p-4">
                        <h5>Ringkasan Transaksi</h5>
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset($program->banner) }}" class="me-3 rounded"
                                style="width:120px; height:100px; object-fit:cover;"
                                onerror="this.onerror=null;this.src='https://placehold.co/600x400';">
                            <div>
                                <a href="{{ route('pages.donation-detail', $program->slug) }}">
                                    <strong>{{ request()->query('program') ?? $program->title }}</strong>
                                </a>
                                <br>
                                <span class="text-secondary">Target Donasi: Rp
                                    {{ number_format($program->target, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-warning btn-lg px-5 rounded-pill shadow">
                            <strong>
                                Bayar Sekarang
                            </strong>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection

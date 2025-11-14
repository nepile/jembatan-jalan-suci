@extends('layouts.page')

@section('title', 'Donasi - Panti Asuhan')

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
                <div class="d-flex justify-content-between align-items-center mb-5 position-relative">
                    <div class="text-center">
                        <div class="rounded-circle bg-warning text-white d-flex align-items-center justify-content-center mx-auto mb-2"
                            style="width: 40px; height: 40px;">1</div>
                        <small class="text-muted">Keranjang</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center mx-auto mb-2"
                            style="width: 40px; height: 40px;">2</div>
                        <small class="text-success fw-bold">Pembayaran</small>
                    </div>
                    <div class="text-center">
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto mb-2"
                            style="width: 40px; height: 40px;">3</div>
                        <small class="text-muted">Selesai</small>
                    </div>
                    <!-- Garis Latar Belakang (Kuning Penuh) -->
                    <div class="progress-bg position-absolute top-50 start-0 w-100 h-1 bg-warning"
                        style="z-index: -1; transform: translateY(-50%);"></div>

                    <!-- Garis Progres (Hijau sampai Step 2) -->
                    <div class="progress-active position-absolute top-50 start-0 h-1 bg-success"
                        style="z-index: -1; transform: translateY(-50%); width: 50%; transition: width 0.4s ease;"></div>
                </div>

                <div class="row g-5">
                    <!-- Profil Donatur -->
                    <div class="col-lg-6">
                        <h4 class="mb-4">Profil Donatur</h4>
                        <form>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label>Sapaan <span class="text-danger">*</span></label>
                                    <select class="form-select" required>
                                        <option>Bapak</option>
                                        <option>Ibu</option>
                                        <option>Saudara</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Depan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nama depan" required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nama Belakang <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="Nama belakang" required>
                                </div>
                                <div class="col-12">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" placeholder="email@contoh.com" required>
                                </div>
                                <div class="col-12">
                                    <label>Telpon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" placeholder="08xxxxxxxxxx" required>
                                </div>
                                <div class="col-12">
                                    <label>Doa & Harapan</label>
                                    <textarea class="form-control" rows="3" placeholder="Tuliskan doa..."></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="anonim">
                                        <label class="form-check-label" for="anonim">Donasi anonim</label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Bank & Ringkasan -->
                    <div class="col-lg-6">
                        <h4 class="mb-4">Pilih Metode Pembayaran <span class="text-danger">*</span></h4>

                        <!-- Scrollable Bank List -->
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
                                            'logo' =>
                                                'https://upload.wikimedia.org/wikipedia/id/5/5c/Bank_Central_Asia.svg',
                                        ],
                                        [
                                            'name' => 'Mandiri',
                                            'logo' =>
                                                'https://upload.wikimedia.org/wikipedia/id/4/40/Bank_Mandiri_logo.svg',
                                        ],
                                        [
                                            'name' => 'BRI',
                                            'logo' =>
                                                'https://upload.wikimedia.org/wikipedia/id/9/9c/Bank_Rakyat_Indonesia_logo.svg',
                                        ],
                                        [
                                            'name' => 'BJB Syariah',
                                            'logo' => 'https://www.bjb.co.id/assets/img/logo-bjb-syariah.png',
                                        ],
                                        [
                                            'name' => 'BNI',
                                            'logo' => 'https://upload.wikimedia.org/wikipedia/id/5/55/BNI_logo.svg',
                                        ],
                                        [
                                            'name' => 'BSI',
                                            'logo' =>
                                                'https://upload.wikimedia.org/wikipedia/id/7/7a/Logo_Bank_Syariah_Indonesia.svg',
                                        ],
                                        [
                                            'name' => 'Muamalat',
                                            'logo' => 'https://www.muamalat.co.id/assets/images/logo.png',
                                        ],
                                    ];
                                @endphp

                                @foreach ($banks as $index => $bank)
                                    <div class="col-12">
                                        <div class="form-check border rounded p-3 mb-2 hover-shadow transition bg-white">
                                            <input class="form-check-input mt-2" type="radio" name="bank"
                                                id="bank-{{ $index }}" value="{{ $bank['name'] }}">
                                            <label class="form-check-label d-flex align-items-center cursor-pointer w-100"
                                                for="bank-{{ $index }}">
                                                <img src="{{ $bank['logo'] }}" alt="{{ $bank['name'] }}" class="me-3"
                                                    style="height: 28px; width: auto;">
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
                            <img src="{{ request()->query('image') ?? asset('images/image.png') }}" class="me-3 rounded"
                                style="width:120px; height:100px; object-fit:cover;">
                            <div>
                                <strong>{{ request()->query('program') ?? 'Program Donasi' }}</strong><br>
                                <span class="text-success">Rp
                                    {{ number_format(request()->query('amount', 10000)) }}</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total Donasi</span>
                            <span class="text-success">Rp {{ number_format(request()->query('amount', 10000)) }}</span>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <button class="btn btn-warning btn-lg px-5 rounded-pill shadow">Bayar Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

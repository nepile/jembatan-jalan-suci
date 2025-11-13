@extends('layouts.page')

@section('title', 'general | donation')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4 p-md-5">

                        <form action="#" method="POST">
                            @csrf

                            <div class="row g-4">
                                <!-- Kolom Kiri: Data Donatur -->
                                <div class="col-md-6">
                                    <h5 class="mb-4 text-success fw-bold">Masukkan atau lengkapi data di bawah ini</h5>

                                    <!-- Telpon -->
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Telpon</label>
                                        <input type="text" class="form-control" placeholder="Masukkan nomor telepon"
                                            required>
                                    </div>

                                    <!-- Gelar & Nama Lengkap -->
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Nama Lengkap</label>
                                        <div class="row g-2">
                                            <div class="col-4">
                                                <select class="form-select" required>
                                                    <option value="" disabled selected>Bapak</option>
                                                    <option>Ibu</option>
                                                    <option>Sdr.</option>
                                                    <option>Sdri.</option>
                                                </select>
                                            </div>
                                            <div class="col-8">
                                                <input type="text" class="form-control" placeholder="Nama Lengkap"
                                                    required>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Email</label>
                                        <input type="email" class="form-control" placeholder="email@contoh.com" required>
                                    </div>

                                    <!-- Nominal -->
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Masukkan nominal min Rp 10.000</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input type="number" class="form-control" min="10000" placeholder="10.000"
                                                required>
                                        </div>
                                    </div>

                                    <!-- Pesan -->
                                    <div class="mb-3">
                                        <label class="form-label fw-medium">Pesan (opsional)</label>
                                        <select class="form-select">
                                            <option>Raih Cinta Nabi Melalui Kasih Sayang Terhadap Yatim</option>
                                            <option>Doakan saya dan keluarga</option>
                                            <option>Terima kasih atas donasinya</option>
                                            <option>Semoga menjadi amal jariyah</option>
                                        </select>
                                    </div>

                                    <!-- Anonim -->
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" id="anonim">
                                        <label class="form-check-label" for="anonim">
                                            Jadikan anonim (HambaAllah)
                                        </label>
                                    </div>
                                </div>

                                <!-- Kolom Kanan: Metode Pembayaran -->
                                <div class="col-md-6">
                                    <h5 class="mb-4 text-success fw-bold">
                                        Pilih Metode Pembayaran <span class="text-danger">*</span>
                                    </h5>

                                    <div class="border rounded p-3 mb-4 bg-light">
                                        <p class="mb-2 fw-semibold text-dark">Bank Transfer (Kode Unik)</p>

                                        <div class="vstack gap-2">
                                            <!-- BCA -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="bca" class="me-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Bank_Central_Asia.svg"
                                                    alt="BCA" width="40">
                                                <span class="ms-2 fw-medium">BCA</span>
                                            </label>

                                            <!-- Mandiri -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="mandiri" class="me-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/ad/Bank_Mandiri_logo.svg"
                                                    alt="Mandiri" width="50">
                                                <span class="ms-2 fw-medium">Mandiri</span>
                                            </label>

                                            <!-- BRI -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="bri" class="me-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6f/BRI_2020.svg"
                                                    alt="BRI" width="40">
                                                <span class="ms-2 fw-medium">BRI</span>
                                            </label>

                                            <!-- BJB Syariah -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="bjb" class="me-3">
                                                <img src="https://www.bankbjb.co.id/assets/img/logo.png" alt="BJB Syariah"
                                                    width="45">
                                                <span class="ms-2 fw-medium">BJB Syariah</span>
                                            </label>

                                            <!-- BNI -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="bni" class="me-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/id/1/1a/Logo_BNI.svg"
                                                    alt="BNI" width="40">
                                                <span class="ms-2 fw-medium">BNI</span>
                                            </label>

                                            <!-- BSI -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="bsi" class="me-3">
                                                <img src="https://upload.wikimedia.org/wikipedia/id/9/90/BSI_logo.svg"
                                                    alt="BSI" width="40">
                                                <span class="ms-2 fw-medium">BSI</span>
                                            </label>

                                            <!-- Muamalat -->
                                            <label class="d-flex align-items-center p-3 border rounded bank-option">
                                                <input type="radio" name="bank" value="muamalat" class="me-3">
                                                <img src="https://www.bankmuamalat.co.id/uploads/logo/Logo_BM.png"
                                                    alt="Muamalat" width="45">
                                                <span class="ms-2 fw-medium">Muamalat</span>
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Tombol Bayar -->
                                    <div class="text-center mt-4">
                                        <button type="submit"
                                            class="btn btn-warning btn-lg px-5 fw-bold rounded-pill shadow-sm">
                                            Bayar sekarang
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BAGIAN BARU: Donasi Terkumpul & Daftar Donatur -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Total Donasi -->
                <div class="text-center mb-4">
                    <h1 class="display-4 fw-bold text-success">Rp 565.678.908</h1>
                    <p class="text-muted">donasi terkumpul melalui donasiyauma.id</p>
                </div>

                <div class="row g-3">
                    <!-- Donasi Terkumpul (Header Kiri) -->
                    <div class="col-md-3">
                        <div class="bg-success text-white text-center p-3 rounded">
                            <small class="fw-bold">Donasi Terkumpul</small>
                        </div>
                    </div>

                    <!-- Tabel Donatur (Header Kanan) -->
                    <div class="col-md-9">
                        <div class="bg-success text-white p-3 rounded d-flex justify-content-between">
                            <div><strong>Donatur</strong></div>
                            <div><strong>Nominal</strong></div>
                            <div><strong>Waktu Donasi</strong></div>
                        </div>
                    </div>
                </div>

                <!-- Daftar Donatur -->
                <div class="row g-0">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                        <div class="border-start border-end">
                            @php
                                $donatur = [
                                    ['Hamba Allah', 'Rp 65.003', '1 hari yang lalu'],
                                    ['Derera Anandhya', 'Rp 31.002', '2 hari yang lalu'],
                                    ['Rakhmayuni', 'Rp 10.001', '2 hari yang lalu'],
                                    ['Princessa Khayyirah Artyefa', 'Rp 100.005', '3 hari yang lalu'],
                                    ['Rakhmayuni', 'Rp 10.003', '3 hari yang lalu'],
                                ];
                            @endphp

                            @foreach ($donatur as $d)
                                <div class="d-flex justify-content-between p-3 border-bottom bg-light">
                                    <div class="fw-medium">{{ $d[0] }}</div>
                                    <div class="text-success fw-bold">{{ $d[1] }}</div>
                                    <div class="text-muted small">{{ $d[2] }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Jumlah Donatur -->
                <div class="row mt-3">
                    <div class="col-md-3">
                        <div class="bg-success text-white text-center p-3 rounded">
                            <small class="fw-bold">Jumlah Donatur : 638</small>
                        </div>
                    </div>
                    <div class="col-md-9"></div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .bank-option {
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .bank-option:hover {
            background-color: #fff3cd !important;
            border-color: #f97316 !important;
        }

        .bank-option input[type="radio"] {
            accent-color: #f97316;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
        }

        .btn-warning {
            background-color: #f97316;
            border: none;
        }

        .btn-warning:hover {
            background-color: #ea580c;
        }

        .bg-light {
            background-color: #f8f9fa !important;
        }
    </style>
@endsection

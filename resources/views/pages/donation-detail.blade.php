
@extends('layouts.page')

@section('title', 'Detail Program Donasi')

@section('content')
  <style>
    .campaign-header {
      background: url('https://via.placeholder.com/1200x400') center/cover no-repeat;
      border-radius: 1rem;
      height: 300px;
      position: relative;
    }
    .campaign-title {
      font-weight: 700;
      font-size: 1.8rem;
    }
    .donation-card {
      border-radius: 1rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .progress-circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      border: 5px solid #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      color: orange;
      font-weight: bold;
    }
    .btn-donate {
      background-color: #ff7f00;
      color: white;
      font-weight: 600;
    }
    .btn-donate:hover {
      background-color: #e96f00;
    }
  </style>
<div class="container py-5">
  <div class="row g-4">
    <!-- Kolom Kiri -->
    <div class="col-lg-8">
      <div class="card border-0">
        <div class="campaign-header d-flex align-items-end justify-content-center text-white p-3" style="background: linear-gradient(135deg, #009688, #00bfa5);">
          <div class="text-center">
            <h3 class="fw-bold text-white mb-1">Mabit Inspiratif Yauma 2025</h3>
            <p class="mb-0">Menjernihkan Hati, Menguatkan Jati Diri</p>
          </div>
        </div>

        <div class="card-body">
          <h4 class="campaign-title mt-3">Mabit Inspiratif Yauma 2025</h4>
          <ul class="nav nav-tabs mt-3" id="campaignTabs" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail" type="button" role="tab">Detail Campaign</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="donatur-tab" data-bs-toggle="tab" data-bs-target="#donatur" type="button" role="tab">Daftar Donatur</button>
            </li>
          </ul>
          <div class="tab-content mt-3" id="campaignTabsContent">
            <div class="tab-pane fade show active" id="detail" role="tabpanel">
              <p><em>“Ketahuilah bahwa di dalam tubuh ada segumpal daging, jika ia baik maka baiklah seluruh tubuh, dan jika ia rusak maka rusaklah seluruh tubuh. Ketahuilah, itulah hati.”</em> <br>(HR. Bukhari dan Muslim)</p>
              <p>Di tengah derasnya arus dunia yang sering mengaburkan nilai-nilai keimanan, anak-anak yatim perlu ruang khusus untuk menenangkan diri, merevitalisasi semangat, dan kembali ke kekuatan hati.</p>
              <a href="#" class="text-decoration-none">Lihat Selengkapnya</a>
            </div>
            <div class="tab-pane fade" id="donatur" role="tabpanel">
              <p>Belum ada donatur.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="col-lg-4">
      <div class="card donation-card p-4">
        <div class="text-center">
          <div class="progress-circle mb-3">0%</div>
          <p class="mb-1">Donasi Terkumpul:</p>
          <h5 class="fw-bold mb-2">Rp 0</h5>
          <p class="text-muted small">dari target donasi Rp 15.000.000</p>
          <p class="mb-1">Sisa Waktu:</p>
          <h5 class="fw-bold text-danger mb-3">59 Hari</h5>
        </div>  

        <div class="d-grid">
          <button class="btn btn-donate btn-lg">Donasi Sekarang</button>
        </div>

        <p class="text-center mt-3 text-muted small mb-0">Bantu Sebarkan Campaign ini:</p>
      </div>
    </div>
  </div>
</div>
@endsection
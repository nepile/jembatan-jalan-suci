<main>
    <!-- 🖼️ Bagian Carousel Banner -->
    @php
        use Illuminate\Support\Facades\File;

        // Ambil semua file gambar dari folder public/images
        $imageFiles = File::files(public_path('images'));
    @endphp

    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            @foreach ($imageFiles as $index => $file)
                @php $filename = basename($file); @endphp
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('images/' . $filename) }}" class="d-block w-100"
                        alt="{{ pathinfo($filename, PATHINFO_FILENAME) }}">
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- 📊 Bagian Statistik -->
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
</main>

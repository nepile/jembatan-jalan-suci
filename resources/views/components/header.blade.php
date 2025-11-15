<header class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- Logo dan Nama -->
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="{{ asset('images/other/logo.jpeg') }}" class="me-2 rounded" height="50" width="50"
                alt="">
            <span class="fs-6"><strong>PANTI ASUHAN <br> JEMBATAN JALAN SUCI</strong></span>
        </a>

        <!-- Hamburger Menu -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <a href="https://www.facebook.com/share/19z4hkVczN/" target="blank"
                class="nav-item btn px-2 btn-rounded nav-link static-item text-center d-none d-lg-inline text-light"><i
                    class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/pantiasuhan.jembatansuci?igsh=OG51NzZ2ZDRobWxx" target="blank"
                class="nav-item btn px-2 btn-rounded nav-link static-item text-center d-none d-lg-inline text-light"><i
                    class="bi bi-instagram"></i></a>
            <a href="https://www.tiktok.com/@ladangtuhan140890?_r=1&_t=ZS-91QJZpkj1Vp" target="blank"
                class="nav-item btn px-2 btn-rounded nav-link static-item text-center d-none d-lg-inline text-light"><i
                    class="bi bi-tiktok"></i></a>

            <div class="d-lg-inline d-none px-3">|</div>
            <a href="{{ route('login') }}" class="btn text-center btn-dark my-4 my-lg-0">Masuk</a>
        </div>
    </div>
</header>

<x-navbar />

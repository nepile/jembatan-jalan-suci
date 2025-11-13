<header class="navbar navbar-expand-lg bg-primary">
    <div class="container text-light">
        <div class="col-lg-5">
            <div class="d-flex align-items-center my-3">
                <img src="{{ asset('images/logo.jpeg') }}" class="me-3 rounded" height="50" width="50"  alt="">
                <h1 class="fs-5">
                    <strong>    
                        PANTI ASUHAN <br> JEMBATAN JALAN SUCI
                    </strong>
                </h1>
            </div>
        </div>
        <div class="col-lg-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <a href="#" class="nav-item btn px-2 btn-rounded nav-link static-item text-center"><i class="bi bi-facebook"></i></a>
                <a href="#" class="nav-item btn px-2 btn-rounded nav-link static-item text-center"><i class="bi bi-instagram"></i></a>
                <a href="#" class="nav-item btn px-2 btn-rounded nav-link static-item text-center"><i class="bi bi-youtube"></i></a>
                <div class="">
                    <div style="display: inline" class="px-3">|</div>
                    <a href="{{ route('login') }}" class="btn btn-dark">Masuk</a>
                </div>
            </div>
        </div>
    </div>
</header>

<x-navbar />
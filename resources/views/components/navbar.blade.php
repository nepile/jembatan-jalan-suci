<style>
    .nav-item .page-link {
        color: #fff;
    }

    .active-menu {
        text-decoration: underline;
        color: #fff;
        font-weight: bold;
    }
</style>
<nav class="navbar navbar-expand-lg bg-primary border-top border-dark border-2">
    <div class="container">
        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item pe-4 {{ request()->routeIs('pages.home') ? 'active-menu' : '' }}">
                    <a class="nav-link page-link page-link" aria-current="page"
                        href="{{ route('pages.home') }}">Beranda</a>
                </li>
                <li class="nav-item pe-4 {{ request()->routeIs('pages.about-us') ? 'active-menu' : '' }}">
                    <a class="nav-link page-link" aria-current="page" href="{{ route('pages.about-us') }}">Tentang
                        Kami</a>
                </li>
                <li class="nav-item pe-4 {{ request()->routeIs('pages.donation-program') ? 'active-menu' : '' }}">
                    <a class="nav-link page-link" aria-current="page"
                        href="{{ route('pages.donation-program') }}">Program
                        Donasi</a>
                </li>
                {{-- <li class="nav-item pe-4 {{ request()->routeIs('pages.general-donation') ? 'active-menu' : '' }}">
                    <a class="nav-link page-link" aria-current="page"
                        href="{{ route('pages.general-donation') }}">Donasi Umum</a>
                </li> --}}
                <li class="nav-item pe-4 {{ request()->routeIs('pages.confirmation-donation') ? 'active-menu' : '' }}">
                    <a class="nav-link page-link" aria-current="page"
                        href="{{ route('pages.confirmation-donation') }}">Konfirmasi
                        Donasi</a>
                </li>

                <li class="nav-item pe-4 {{ request()->routeIs('pages.gallery') ? 'active-menu' : '' }}">
                    <a class="nav-link page-link" aria-current="page" href="{{ route('pages.gallery') }}">
                        Galeri</a>
                </li>

                {{-- <li class="nav-item pe-4">
          <a class="nav-link page-link" aria-current="page" href="">Kegiatan</a>
        </li>
        <li class="nav-item pe-4">
          <a class="nav-link page-link" aria-current="page" href="">Formulir</a>
        </li> --}}
            </ul>
        </div>
    </div>
</nav>

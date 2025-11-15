<!-- Menggunakan x-data untuk mengelola state sidebar: open atau closed -->
<div x-data="{ sidebarOpen: false }" class="relative z-40 md:z-0">

    <!-- Tombol Hamburger untuk Mobile/Tablet -->
    <button @click="sidebarOpen = true"
        class="fixed top-4 left-4 z-50 p-2 md:hidden bg-blue-700 text-white rounded-lg shadow-xl hover:bg-blue-800 transition">
        <!-- Icon Menu (Hamburger) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Overlay/Background Gelap (Hanya tampil saat mobile sidebar terbuka) -->
    <div x-show="sidebarOpen" x-transition.opacity.duration.300ms
        class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar Utama (Menggunakan Alpine.js untuk menampilkan/menyembunyikan) -->
    <aside
        class="fixed inset-y-0 left-0 w-64 bg-blue-900 text-white min-h-screen flex flex-col transform transition-transform duration-300 ease-in-out z-50"
        :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'md:relative md:translate-x-0': true }">
        <!-- Tombol Tutup (Hanya di Mobile) -->
        <div class="p-4 md:hidden flex justify-end">
            <button @click="sidebarOpen = false" class="text-white hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Logo -->
        <div class="p-6 border-b border-blue-800 flex items-center justify-center">
            <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center">
                <img src="{{ asset('images/other/logo.jpeg') }}" alt="Logo" width="100"
                    class="rounded mb-2 shadow-lg">
            </a>
        </div>

        <!-- Menu Navigasi -->
        <nav class="mt-4 p-2 flex-1 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path
                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span>Dashboard</span>
            </a>

            @if (auth()->user()->role == 'SUPERADMIN')
                <a href="{{ route('admin.admin') }}"
                    class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.admin') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Data Admin</span>
                </a>
            @endif

            <a href="{{ route('admin.donation') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 
                    {{ request()->routeIs('admin.donation') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">

                <!-- IKON BARU DONASI -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M2.166 8.94a5.5 5.5 0 017.768-7.768L10 1.237l.066.066a5.5 5.5 0 017.768 7.768L10 18.605 2.166 8.94z" />
                </svg>

                <span>Donasi</span>
            </a>

            <a href="{{ route('admin.program') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 
                    {{ request()->routeIs('admin.program') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">

                <!-- IKON BARU PROGRAM DONASI -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a2 2 0 00-2 2v9a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-3.382l-.724-1.447A1 1 0 0011 2H9z" />
                    <path
                        d="M8.707 10.293a1 1 0 011.414 0L11 11.172l2.879-2.879a1 1 0 111.414 1.414L11 14l-3.707-3.707a1 1 0 010-1.414z" />
                </svg>

                <span>Program Donasi</span>
            </a>


            <a href="{{ route('admin.gallery') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.gallery') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 4-4 5 7z"
                        clip-rule="evenodd" />
                </svg>
                <span>Galeri</span>
            </a>

            <a href="{{ route('admin.settings') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 
                    {{ request()->routeIs('admin.settings') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">

                <!-- IKON BARU PENGATURAN -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M11.983 1.37a1 1 0 00-1.966 0l-.324 1.588a6.992 6.992 0 00-1.63.942L6.29 2.96a1 1 0 00-1.415 1.415l.94 1.773a7.01 7.01 0 00-.94 1.63L3.287 7.01a1 1 0 00-1.587 1.966l1.588.324c.139.58.33 1.14.569 1.674l-1.773.94a1 1 0 101.415 1.415l1.773-.94c.534.239 1.094.43 1.674.569l.324 1.588a1 1 0 001.966-1.966l-1.588-.324a7.01 7.01 0 00-.569-1.674l1.773-.94a1 1 0 10-1.415-1.415l-1.773.94a6.992 6.992 0 00-.942-1.63l1.588-.324A1 1 0 008.653 4.96l-.324-1.588a1 1 0 001.654-.962zM10 13a3 3 0 100-6 3 3 0 000 6z"
                        clip-rule="evenodd" />
                </svg>

                <span>Pengaturan</span>
            </a>
        </nav>

        <!-- Keluar -->
        <div class="mt-auto p-4 border-t border-blue-800">
            <form action="{{ route('logout.handle') }}" method="POST" class="w-full">
                @csrf
                <button type="submit"
                    class="w-full flex items-center space-x-2 px-4 py-2 rounded-lg text-gray-200 hover:bg-red-700 hover:text-white transition duration-150 ease-in-out font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 011-1h8a1 1 0 011 1v3a1 1 0 01-2 0V4H5v12h6v-2a1 1 0 112 0v3a1 1 0 01-1 1H4a1 1 0 01-1-1V3zm10 8a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>
</div>

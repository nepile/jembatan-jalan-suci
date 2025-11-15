<!-- Menggunakan x-data untuk mengelola state sidebar: open atau closed -->
<div x-data="{ sidebarOpen: false }" class="relative z-40 md:z-0">

    <!-- Tombol Hamburger untuk Mobile/Tablet -->
    <button @click="sidebarOpen = true" class="fixed top-4 left-4 z-50 p-2 md:hidden bg-blue-700 text-white rounded-lg shadow-xl hover:bg-blue-800 transition">
        <!-- Icon Menu (Hamburger) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Overlay/Background Gelap (Hanya tampil saat mobile sidebar terbuka) -->
    <div x-show="sidebarOpen" x-transition.opacity.duration.300ms class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden" @click="sidebarOpen = false"></div>

    <!-- Sidebar Utama (Menggunakan Alpine.js untuk menampilkan/menyembunyikan) -->
    <aside 
        class="fixed inset-y-0 left-0 w-64 bg-blue-900 text-white min-h-screen flex flex-col transform transition-transform duration-300 ease-in-out z-50"
        :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen, 'md:relative md:translate-x-0': true}"
    >
        <!-- Tombol Tutup (Hanya di Mobile) -->
        <div class="p-4 md:hidden flex justify-end">
            <button @click="sidebarOpen = false" class="text-white hover:text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Logo -->
        <div class="p-6 border-b border-blue-800 flex items-center justify-center">
            <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center">
                <img src="{{ asset('images/other/logo.jpeg') }}" alt="Logo" width="100" class="rounded mb-2 shadow-lg">
            </a>
        </div>

        <!-- Menu Navigasi -->
        <nav class="mt-4 p-2 flex-1 space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('admin.admin') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.admin') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" /></svg>
                <span>Data Admin</span>
            </a>

            <a href="{{ route('admin.donation') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.donation') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 10-2 0v1a1 1 0 102 0V3zM8 5a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1zM10 12a2 2 0 100-4 2 2 0 000 4zM16 12a4 4 0 10-8 0 4 4 0 008 0z" /></svg>
                <span>Donasi</span>
            </a>

            <a href="{{ route('admin.program') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.program') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 12.062V10a1 1 0 00-2 0v2.062a2 2 0 100 3.876V16a1 1 0 102 0v-1.062a2 2 0 100-3.876z" /></svg>
                <span>Program Donasi</span>
            </a>

            <a href="{{ route('admin.gallery') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.gallery') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 4-4 5 7z" clip-rule="evenodd" /></svg>
                <span>Galeri</span>
            </a>

            <a href="{{ route('admin.settings') }}"
                class="flex items-center space-x-2 px-4 py-2 rounded-lg transition duration-150 ease-in-out 
                    {{ request()->routeIs('admin.settings') ? 'bg-blue-700 text-white font-semibold shadow-md' : 'text-gray-200 hover:bg-blue-800' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-.28-.86-.28-1.24 0L6.29 6.29c-.38.38-.38 1.02 0 1.4L10 11.4l3.71-3.71c.38-.38.38-1.02 0-1.4l-3.29-3.29zM10 13a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" /></svg>
                <span>Pengaturan</span>
            </a>
        </nav>
        
        <!-- Keluar -->
        <div class="mt-auto p-4 border-t border-blue-800">
            <form action="{{ route('logout.handle') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center space-x-2 px-4 py-2 rounded-lg text-gray-200 hover:bg-red-700 hover:text-white transition duration-150 ease-in-out font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h8a1 1 0 011 1v3a1 1 0 01-2 0V4H5v12h6v-2a1 1 0 112 0v3a1 1 0 01-1 1H4a1 1 0 01-1-1V3zm10 8a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" /></svg>
                    <span>Keluar</span>
                </button>
            </form>
        </div>
    </aside>
</div>
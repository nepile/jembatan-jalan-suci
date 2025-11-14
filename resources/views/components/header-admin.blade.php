<!-- Pastikan Alpine.js sudah diinstal agar dropdown berfungsi. -->

<header class="bg-white shadow-lg w-full px-4 sm:px-8 py-4 flex justify-between items-center sticky top-0 z-30 transition-all duration-300">
    <!-- Catatan: Kelas 'px-4 sm:px-8' memastikan padding kiri dan kanan menyesuaikan. -->
    
    <!-- Logo/Judul -->
    <div class="flex items-center space-x-3">
        <span class="text-xl sm:text-2xl font-extrabold text-blue-700 tracking-tight">
            Admin Panel
        </span>
    </div>

    <!-- Notifikasi & Pengguna -->
    <div class="flex items-center space-x-4 sm:space-x-6">
        <!-- Notifikasi -->
        <button class="relative text-gray-500 hover:text-red-600 transition duration-150 p-2 rounded-full hover:bg-gray-100" title="Notifikasi">
            <!-- Ikon Lonceng -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <!-- Badge Notifikasi -->
            <span class="absolute top-0 right-0 transform translate-x-1/4 -translate-y-1/4 bg-red-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold border-2 border-white">3</span>
        </button>

        <!-- User Dropdown (Menggunakan Alpine.js untuk responsifitas sentuhan/klik) -->
        <div x-data="{ userDropdownOpen: false }" @click.outside="userDropdownOpen = false" class="relative">
            <!-- Tombol Dropdown -->
            <button @click="userDropdownOpen = !userDropdownOpen" 
                    class="flex items-center space-x-2 text-gray-700 hover:text-blue-600 focus:outline-none bg-gray-50 px-3 py-1.5 rounded-full transition duration-150 ring-2 ring-transparent hover:ring-blue-300"
                    aria-expanded="userDropdownOpen ? 'true' : 'false'">
                
                <!-- Avatar Pengguna (Gunakan URL asli jika tersedia) -->
                <img class="h-8 w-8 rounded-full object-cover shadow-sm" src="https://placehold.co/50x50/1e40af/ffffff?text=AD" alt="Avatar">
                
                <!-- Nama Pengguna (Disembunyikan di layar sangat kecil) -->
                <span class="hidden md:inline font-medium text-sm">{{ Auth::user()->name ?? 'Admin' }}</span>
                
                <!-- Ikon Panah -->
                <svg :class="{'rotate-180': userDropdownOpen}" class="h-4 w-4 transform transition duration-200 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Isi Dropdown -->
            <div x-show="userDropdownOpen" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-3 w-48 bg-white border border-gray-200 rounded-lg shadow-xl overflow-hidden z-40 origin-top-right">
                
                <!-- Menu Item: Profil -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    <span>Profil Saya</span>
                </a>
                
                <div class="border-t border-gray-100"></div>

                <!-- Menu Item: Logout -->
                <form action="#" method="POST">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 hover:text-red-700 transition flex items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        <span>Keluar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
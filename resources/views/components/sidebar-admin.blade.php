<aside class="w-64 bg-blue-900 text-white min-h-screen flex flex-col">
    <!-- Logo -->
    <div class="p-6 border-b border-blue-800 flex items-center justify-center">
        <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center">
            <img src="{{ asset('images/logo.jpeg') }}" alt="Logo" width="100" class="rounded mb-2">
        </a>
    </div>

    <!-- Menu Navigasi -->
    <nav class="mt-4 flex-1">
        <a href="{{ route('admin.dashboard') }}"
            class="block px-4 py-2 rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 text-white' : 'text-gray-200 hover:bg-blue-800' }}">
            Dashboard
        </a>

        <a href="{{ route('admin.donation') }}"
            class="block px-4 py-2 rounded-md {{ request()->routeIs('admin.donation') ? 'bg-blue-700 text-white' : 'text-gray-200 hover:bg-blue-800' }}">
            Donasi
        </a>

        <a href="{{ route('admin.program') }}"
            class="block px-4 py-2 rounded-md {{ request()->routeIs('admin.program') ? 'bg-blue-700 text-white' : 'text-gray-200 hover:bg-blue-800' }}">
            Program Donasi
        </a>

        <a href="{{ route('admin.settings') }}"
            class="block px-4 py-2 rounded-md {{ request()->routeIs('admin.settings') ? 'bg-blue-700 text-white' : 'text-gray-200 hover:bg-blue-800' }}">
            Pengaturan
        </a>

        <form action="{{ route('logout.handle') }}" method="POST" class="block px-4 py-2 rounded-md">
            @csrf
            <button type="submit">Keluar</button>
        </a>
    </nav>
</aside>

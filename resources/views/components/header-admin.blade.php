<header class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
        <span class="text-xl font-semibold text-gray-700">Admin Panel</span>
    </div>

    <!-- Notification & User -->
    <div class="flex items-center space-x-6">
        <!-- Notification -->
        <button class="relative text-gray-600 hover:text-gray-800">
            <i class="fa fa-bell text-lg"></i>
            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">3</span>
        </button>

        <!-- User Dropdown -->
        <div class="relative">
            <button class="flex items-center space-x-2 text-gray-700 hover:text-gray-900 focus:outline-none">
                <i class="fa fa-user-circle text-2xl"></i>
                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
                <i class="fa fa-chevron-down text-sm"></i>
            </button>
            <div class="absolute right-0 mt-2 w-40 bg-white border rounded shadow-lg hidden group-hover:block">
                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                <form action="#" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

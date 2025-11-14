
<!-- Footer -->
<footer class="bg-gray-50 border-t w-full p-4 text-center text-gray-600 text-xs sm:text-sm transition-all duration-300">
    <!-- Catatan: 'p-4' memastikan padding di semua sisi, membuat isinya tetap di tengah. -->
    <p>
        © {{ date('Y') }} Sistem Donasi | Dikelola oleh {{ Auth::user()->name ?? 'Admin' }}. 
        <span class="block sm:inline mt-1 sm:mt-0 text-gray-500">Semua Hak Cipta Dilindungi.</span>
    </p>
</footer>
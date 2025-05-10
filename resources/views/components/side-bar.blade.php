<aside class="w-full lg:w-64 h-screen bg-[#D3D3D3] shadow-lg p-6">
    <!-- Logo di sebelah kiri tulisan "Admin RT" -->
    <div class="mb-6 flex items-center space-x-3">
        <!-- Ganti 'path-to-your-logo.png' dengan path logo Anda -->
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8" />
        <h2 class="text-2xl font-bold text-black">Admin RT</h2>
    </div>

    <nav class="space-y-4">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 text-black hover:text-white active:text-white">
            <i class="bi bi-house-door"></i>
            <span>Dashboard</span>
        </a>
        <a href="{{ route('admin.pengajuan') }}" class="flex items-center space-x-3 text-black hover:text-white active:text-white">
            <i class="bi bi-file-earmark-text"></i>
            <span>Kelola Pengajuan Warga</span>
        </a>
        <a href="{{ route('admin.monitoring') }}" class="flex items-center space-x-3 text-black hover:text-white active:text-white">
            <i class="bi bi-person-check"></i>
            <span>Monitoring Tamu</span>
        </a>
        <a href="{{ route('admin.laporan') }}" class="flex items-center space-x-3 text-black hover:text-white active:text-white">
            <i class="bi bi-bar-chart-line"></i>
            <span>Laporan Wilayah</span>
        </a>

        <!-- Logout pakai Form POST -->
        <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
            @csrf
            <button type="submit" class="flex items-center space-x-3 text-red-600 hover:text-red-800 w-full text-left">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>

<!-- Menyisipkan JavaScript di bawah -->
<script>
    // Fungsi konfirmasi logout
    function confirmLogout() {
        // Menampilkan dialog konfirmasi
        if (confirm("Apakah Anda yakin ingin keluar?")) {
            // Jika pengguna mengonfirmasi logout, form akan disubmit
            return true;
        } else {
            // Jika pengguna membatalkan, form tidak disubmit
            return false;
        }
    }

    // Menambahkan event listener ke form logout
    document.getElementById("logoutForm").addEventListener("submit", function(event) {
        // Mencegah form submit langsung
        event.preventDefault();
        
        // Menampilkan alert
        alert("Sesi Anda berhasil diakhiri.");
        
        // Mengonfirmasi dan mengirimkan form setelah alert
        if (confirmLogout()) {
            this.submit(); // Jika konfirmasi berhasil, submit form
        }
    });
</script>
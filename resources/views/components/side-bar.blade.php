<!-- Tambahkan ini di bagian atas halaman Blade layout utama (atau di <head>) -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<aside class="w-full lg:w-64 min-h-screen bg-[#D3D3D3] shadow-lg p-6">
    <div class="mb-6 flex items-center space-x-3">
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
        <a href="{{ route('admin.dataUsers') }}" class="flex items-center space-x-3 text-black hover:text-white active:text-white">
            <i class="bi bi-people"></i>
            <span>Kelola Data User</span>
        </a>

        <!-- Logout dengan konfirmasi SweetAlert -->
        <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
            @csrf
            <button type="submit" class="flex items-center space-x-3 text-red-600 hover:text-red-800 w-full text-left">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </button>
        </form>
    </nav>
</aside>

<script>
    document.getElementById("logoutForm").addEventListener("submit", function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Sesi Anda akan diakhiri.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Submit form jika dikonfirmasi
            }
        });
    });
</script>

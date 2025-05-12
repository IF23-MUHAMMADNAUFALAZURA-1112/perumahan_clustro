<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Sidebar yang tetap berada di kiri dan penuh sepanjang layar */
        #sidebar {
            #sidebar {
                transition: transform 0.5s ease;
                /* Efek transisi lebih lambat untuk gerakan yang lebih halus */
            }

            position: fixed;
            /* Sidebar tetap di kiri */
            top: 0;
            left: 0;
            z-index: 20;
            /* Agar sidebar muncul di atas */
            height: 100vh;
            /* Tinggi penuh layar */
            width: 250px;
            /* Lebar sidebar, bisa disesuaikan */
            background-color: #D3D3D3;
            /* Warna latar sidebar */
            padding: 1.5rem;
            /* Padding di dalam sidebar */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            /* Efek bayangan pada sidebar */
        }

        /* Ketika sidebar disembunyikan, geser ke kiri */
        #sidebar.hidden {
            transform: translateX(-100%);
        }

        /* Tombol hamburger */
        .hamburger-button {
            z-index: 50;
            /* Pastikan tombol hamburger tetap di atas */
        }

        /* Bagian utama konten */
        main {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 0;
            /* Margin awal untuk konten utama */
            flex: 1;
            /* Membuat konten utama mengisi sisa ruang */
        }

        /* Jika sidebar tidak tersembunyi, geser konten utama */
        #sidebar:not(.hidden)+main {
            margin-left: 250px;
            /* Geser konten utama sesuai lebar sidebar */
        }

        /* Atur body menggunakan flexbox agar footer selalu di bawah */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Pastikan tinggi body memenuhi layar */
        }

        /* Styling footer agar tetap di bawah */
        footer {
            background-color: #808080;
            padding: 1rem;
            text-align: center;
            width: 100%;
            position: relative;
            /* Posisi footer dalam aliran dokumen */
            bottom: 0;
        }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <div class="flex flex-1 flex-col lg:flex-row min-h-screen">
        <!-- Sidebar -->
        <aside id="sidebar" class="lg:w-64 w-full min-h-screen bg-[#D3D3D3] shadow-lg p-6 lg:block hidden">
            <div class="mb-6 flex items-center space-x-3">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8" />
                <h2 class="text-2xl font-bold text-black">Admin RT</h2>
            </div>

            <nav class="space-y-4">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center space-x-3 text-black hover:text-white active:text-white">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('admin.pengajuan') }}"
                    class="flex items-center space-x-3 text-black hover:text-white active:text-white">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Kelola Pengajuan Warga</span>
                </a>
                <a href="{{ route('admin.monitoring') }}"
                    class="flex items-center space-x-3 text-black hover:text-white active:text-white">
                    <i class="bi bi-person-check"></i>
                    <span>Monitoring Tamu</span>
                </a>
                <a href="{{ route('admin.laporan') }}"
                    class="flex items-center space-x-3 text-black hover:text-white active:text-white">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>Laporan Wilayah</span>
                </a>
                <a href="{{ route('admin.dataUsers') }}"
                    class="flex items-center space-x-3 text-black hover:text-white active:text-white">
                    <i class="bi bi-people"></i>
                    <span>Kelola Data User</span>
                </a>

                <!-- Logout dengan konfirmasi SweetAlert -->
                <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-3 text-red-600 hover:text-red-800 w-full text-left">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Tombol Hamburger (Untuk Mobile) -->
        <button id="hamburger-btn" class="lg:hidden p-4 absolute top-4 left-4 z-50" onclick="toggleSidebar()">
            <i class="bi bi-list text-2xl"></i> <!-- Ikon Hamburger -->
        </button>

        <!-- Konten Utama -->
        <main class="flex-1 p-4 sm:p-6 md:p-8 overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <!-- Tombol Hamburger -->
                <button id="hamburger-btn" class="lg:hidden p-4 text-2xl text-gray-800" onclick="toggleSidebar()">
                    <i class="bi bi-list"></i> <!-- Ikon Hamburger -->
                </button>

                <!-- Teks "Halo, admin" -->
                <h1 class="text-xl sm:text-2xl font-bold text-gray-800 flex-1 ml-4">Halo,
                    {{ Auth::guard('admin')->user()->username }}
                </h1>
            </div>

            <!-- Teks "Selamat datang" dengan ruang yang disesuaikan -->
            <p class="text-sm sm:text-base text-gray-700 mb-4">Selamat datang di dashboard admin. Berikut fitur yang
                tersedia:</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Fitur 1 -->
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-base sm:text-lg font-semibold mb-2 flex items-center space-x-2">
                        <i class="bi bi-pencil-square"></i>
                        <span>Kelola Pengajuan Warga</span>
                    </h3>
                    <ul class="text-gray-600 text-sm list-disc pl-5">
                        <li>Verifikasi permohonan</li>
                        <li>Setujui atau tolak pengajuan</li>
                    </ul>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-base sm:text-lg font-semibold mb-2 flex items-center space-x-2">
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Monitoring Tamu</span>
                    </h3>
                    <ul class="text-gray-600 text-sm list-disc pl-5">
                        <li>Lihat daftar tamu di rumah warga</li>
                        <li>Data kunjungan wilayah</li>
                    </ul>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-base sm:text-lg font-semibold mb-2 flex items-center space-x-2">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Laporan Wilayah</span>
                    </h3>
                    <ul class="text-gray-600 text-sm list-disc pl-5">
                        <li>Jumlah tamu harian/bulanan</li>
                        <li>Data pengajuan administrasi</li>
                        <li>Laporan pengaduan</li>
                    </ul>
                </div>
            </div>

            <!-- Tabel Laporan Wilayah -->
            <div class="mt-8 overflow-x-auto">
                <h3 class="text-lg sm:text-xl font-semibold mb-4">Laporan Wilayah</h3>
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md text-sm sm:text-base">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-4 py-2 text-left">Nama</th>
                            <th class="px-4 py-2 text-left">Jenis Pengajuan</th>
                            <th class="px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2 text-gray-800">John Doe</td>
                            <td class="px-4 py-2 text-gray-700">Surat Domisili</td>
                            <td class="px-4 py-2 text-gray-700">Pending</td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2 text-gray-800">Jane Smith</td>
                            <td class="px-4 py-2 text-gray-700">Surat Keterangan Kelahiran</td>
                            <td class="px-4 py-2 text-gray-700">Disetujui</td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-4 py-2 text-gray-800">Michael Johnson</td>
                            <td class="px-4 py-2 text-gray-700">Kartu Keluarga</td>
                            <td class="px-4 py-2 text-gray-700">Ditolak</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 Perumahan Cluster. All Rights Reserved.</p>
    </footer>

    <script>
        // Fungsi untuk mengubah tampilan sidebar
        function toggleSidebar() {
            const sidebar = document.getElementById("sidebar");
            const hamburgerBtn = document.getElementById("hamburger-btn");
            sidebar.classList.toggle("hidden");

            // Menyembunyikan tombol hamburger saat sidebar terbuka
            if (sidebar.classList.contains("hidden")) {
                hamburgerBtn.classList.remove("hidden");
            } else {
                hamburgerBtn.classList.add("hidden");
            }
        }

        // Konfirmasi logout menggunakan SweetAlert
        document.getElementById("logoutForm").addEventListener("submit", function (event) {
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
                    this.submit();
                }
            });
        });
    </script>

</body>

</html>
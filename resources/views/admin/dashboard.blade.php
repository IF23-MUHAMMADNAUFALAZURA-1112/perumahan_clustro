<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .active {
            color: #1d4ed8;
            /* Warna biru */
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Wrapper flex untuk sidebar dan konten utama -->
    <div class="flex flex-1 flex-col lg:flex-row">
        <!-- Sidebar -->
        <x-side-bar class="lg:w-64 w-full" />

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-4">Halo, {{ Auth::guard('admin')->user()->username }}</h1>
            <p class="text-gray-700 mb-6">Selamat datang di dashboard admin. Berikut fitur yang tersedia:</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Fitur 1 -->
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
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
                    <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
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
                    <h3 class="text-lg font-semibold mb-2 flex items-center space-x-2">
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

            <!-- Laporan Wilayah Table -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Laporan Wilayah</h3>
                <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-100 text-gray-600">
                        <tr>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3 text-left">Jenis Pengajuan</th>
                            <th class="px-6 py-3 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-3 text-gray-800">John Doe</td>
                            <td class="px-6 py-3 text-gray-700">Surat Domisili</td>
                            <td class="px-6 py-3 text-gray-700">Pending</td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-3 text-gray-800">Jane Smith</td>
                            <td class="px-6 py-3 text-gray-700">Surat Keterangan Kelahiran</td>
                            <td class="px-6 py-3 text-gray-700">Disetujui</td>
                        </tr>
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-3 text-gray-800">Michael Johnson</td>
                            <td class="px-6 py-3 text-gray-700">Kartu Keluarga</td>
                            <td class="px-6 py-3 text-gray-700">Ditolak</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <x-footer />

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: "{{ session('error') }}",
                showConfirmButton: true
            });
        </script>
    @endif

</body>

</html>
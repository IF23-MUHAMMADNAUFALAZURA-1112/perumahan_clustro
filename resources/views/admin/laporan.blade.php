<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Wilayah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">

    <!-- Wrapper untuk Flexbox -->
    <div class="flex flex-1 flex-col lg:flex-row">

        <!-- Sidebar -->
        <x-side-bar class="lg:w-64 w-full" />

        <!-- Konten Utama (Laporan Wilayah) -->
        <div class="flex-1 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Laporan Wilayah</h2>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Tanggal</th>
                        <th class="px-6 py-3 text-left">Tipe Laporan</th>
                        <th class="px-6 py-3 text-left">Isi Laporan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($laporans as $laporan)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-3 text-gray-800">{{ \Carbon\Carbon::parse($laporan->tanggal)->format('d M Y') }}</td>
                            <td class="px-6 py-3 capitalize text-gray-700">{{ $laporan->tipe }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $laporan->isi_laporan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-3 text-center text-gray-500">Belum ada laporan yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <!-- Footer -->
    <x-footer class="mt-auto" />

</body>

</html>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Monitoring Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Wrapper untuk Flexbox -->
    <div class="flex flex-col lg:flex-row">

        <!-- Panggil Sidebar Komponen -->
        <x-side-bar class="lg:w-64 w-full" />

        <!-- Konten Utama (Monitoring Tamu) -->
        <div class="flex-1 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Monitoring Tamu</h2>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Nama Tamu</th>
                        <th class="px-6 py-3 text-left">Tujuan Rumah</th>
                        <th class="px-6 py-3 text-left">Keperluan</th>
                        <th class="px-6 py-3 text-left">Waktu Kunjungan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tamus as $tamu)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-3 text-gray-800">{{ $tamu->nama_tamu }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $tamu->tujuan_rumah }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $tamu->keperluan }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ \Carbon\Carbon::parse($tamu->waktu_kunjungan)->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <!-- Panggil Footer Komponen -->
    <x-footer />

</body>

</html>
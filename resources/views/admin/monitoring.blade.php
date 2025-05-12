<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Monitoring Tamu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Wrapper utama -->
    <div class="flex flex-1 flex-col lg:flex-row min-h-screen w-full">

        <!-- Sidebar -->
        <x-side-bar class="lg:w-64 w-full lg:h-screen" />

        <!-- Konten utama -->
        <div class="flex-1 flex flex-col bg-white">

            <!-- Konten scrollable -->
            <main class="flex-1 p-4 sm:p-6 md:p-8 overflow-auto">
                <h2 class="text-2xl sm:text-3xl font-semibold text-gray-800 mb-6 text-center sm:text-left">
                    Monitoring Tamu
                </h2>

                <!-- Tabel Responsif -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md text-sm sm:text-base">
                        <thead class="bg-gray-100 text-gray-600">
                            <tr>
                                <th class="px-4 py-3 text-left">Nama Tamu</th>
                                <th class="px-4 py-3 text-left">Tujuan Rumah</th>
                                <th class="px-4 py-3 text-left">Keperluan</th>
                                <th class="px-4 py-3 text-left">Waktu Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tamus as $tamu)
                                <tr class="border-t border-gray-200">
                                    <td class="px-4 py-3 text-gray-800">{{ $tamu->nama_tamu }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $tamu->tujuan_rumah }}</td>
                                    <td class="px-4 py-3 text-gray-700">{{ $tamu->keperluan }}</td>
                                    <td class="px-4 py-3 text-gray-700">
                                        {{ \Carbon\Carbon::parse($tamu->waktu_kunjungan)->format('d M Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>

            <!-- Footer -->
            <x-footer />
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Pengajuan Warga</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex">


    <!-- Wrapper untuk Flexbox -->
   <div class="flex flex-col lg:flex-row min-h-screen w-full">

        <!-- Panggil Sidebar Komponen -->
        <x-side-bar class="lg:w-64 w-full" />

        <!-- Konten Utama (Daftar Pengajuan Warga) -->
        <div class="flex-1 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Daftar Pengajuan Warga</h2>

            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="px-6 py-3 text-left">Nama</th>
                        <th class="px-6 py-3 text-left">Jenis Pengajuan</th>
                        <th class="px-6 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pengajuans as $item)
                        <tr class="border-t border-gray-200">
                            <td class="px-6 py-3 text-gray-800">{{ $item->nama_warga }}</td>
                            <td class="px-6 py-3 text-gray-700">{{ $item->jenis_pengajuan }}</td>
                            <td class="px-6 py-3 capitalize text-gray-700">{{ $item->status }}</td>
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
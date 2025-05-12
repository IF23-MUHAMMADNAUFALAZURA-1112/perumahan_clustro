<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Data Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Data Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <div class="flex flex-1 flex-col lg:flex-row">
        <x-side-bar class="lg:w-64 w-full" />

        <div class="flex-1 p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">Kelola Data Pengguna</h2>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form method="GET" action="{{ route('admin.dataUsers') }}" class="mb-6 flex gap-2">
                <input type="text" name="search" placeholder="Cari nama/email..." value="{{ request('search') }}"
                    class="w-full px-4 py-2 border rounded shadow-sm" />
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Cari</button>
            </form>

            {{-- PEMISAH: WARGA --}}
            <h3 class="text-xl font-bold text-gray-700 mt-4 mb-2">👤 Warga</h3>
            <x-user-table :users="$users->where('role', 'warga')" />

            {{-- PEMISAH: SATPAM --}}
            <h3 class="text-xl font-bold text-gray-700 mt-8 mb-2">🛡️ Satpam</h3>
            <x-user-table :users="$users->where('role', 'satpam')" />
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#808080] text-white p-4 text-center mt-auto">
        <p>&copy; 2025 Perumahan Cluster. All Rights Reserved.</p>
    </footer>
</body>

</html>

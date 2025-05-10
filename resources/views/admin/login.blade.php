<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Container untuk form login -->
    <div class="w-full max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login Admin</h2>

        @if(session('error'))
            <div class="text-red-600 mb-4 text-center font-medium">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" onsubmit="return handleLogin(event)">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
            </div>

            <div class="mb-4 relative">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                <i id="togglePassword" class="bi bi-eye absolute top-1/2 right-3 transform -translate-y-1/2 cursor-pointer text-gray-500"></i>
            </div>

            <!-- Tombol Login -->
            <button id="loginBtn" type="submit" class="w-full bg-green-600 text-white py-2 rounded flex items-center justify-center hover:bg-green-700 active:bg-green-800">
                <span id="loginText">Login</span>
                <div id="loadingSpinner" class="hidden ml-2 border-4 border-t-4 border-white rounded-full w-4 h-4 animate-spin"></div>
            </button>
        </form>
    </div>

    <script>
        // Toggle password visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });

        function handleLogin(event) {
            event.preventDefault(); // Hindari submit langsung
            document.getElementById('loginBtn').disabled = true;
            document.getElementById('loginText').innerText = "Processing...";
            document.getElementById('loadingSpinner').classList.remove('hidden');

            // Submit form setelah delay loading (simulasi)
            setTimeout(() => {
                event.target.submit();
            }, 1000); // ← Ubah delay jika perlu
            return false;
        }

        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>
</body>

</html>
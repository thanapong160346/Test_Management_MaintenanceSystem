<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ระบบจัดการครุภัณฑ์และแจ้งซ่อม</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                background-color: #f4f4f4;
            }
        </style>
    </head>
    <body class="bg-gray-100 flex justify-center items-center min-h-screen">
        <div class="container mx-auto p-6 rounded-lg shadow-lg bg-white">
            <!-- Header Section -->
            <header class="text-center mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">ระบบจัดการครุภัณฑ์และแจ้งซ่อม</h1>
                <p class="text-gray-600 mt-2">เพิ่มและจัดการครุภัณฑ์พร้อมระบบแจ้งซ่อม</p>
            </header>

            <!-- Navigation Bar -->
            <nav class="mb-6">
                <ul class="flex flex-wrap justify-center gap-4">
                    <li><a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">Dashboard</a></li>
                    <li><a href="{{ route('login') }}" class="px-5 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition duration-200">Login</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="px-5 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 transition duration-200">Register</a></li>
                    @endif
                </ul>
            </nav>

            <!-- Footer -->
            <footer class="text-center">
                <p class="text-sm text-gray-500">© 2025 ระบบจัดการครุภัณฑ์และแจ้งซ่อม</p>
            </footer>
        </div>

        <!-- Bootstrap & TailwindJS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>

<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')  <!-- ส่วนหัวของหน้า -->
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <!-- Sidebar เรียกใช้ Blade Component -->
        <x-layouts.app.sidebar :title="$title ?? null" />

        <!-- Main Content -->
        <flux:main>
            {{ $slot }}  <!-- ส่วนของเนื้อหาหลักของแต่ละหน้า -->
        </flux:main>

        @fluxScripts  <!-- โหลดสคริปต์ที่จำเป็น -->
    </body>
</html>

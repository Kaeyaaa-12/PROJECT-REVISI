<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Amira Collection</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white font-sans">

    @include('admin.layouts.header')

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Baris @include('admin.layouts.footer') telah dihapus --}}

</body>

</html>

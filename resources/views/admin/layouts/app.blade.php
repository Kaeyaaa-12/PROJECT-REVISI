<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Amira Collection</title>

    {{-- Font Styles --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Montserrat:wght@400;600&display=swap"
        rel="stylesheet">

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

{{-- [PERUBAHAN] Bungkus body dengan div x-data --}}

<body class="bg-gray-900 text-white font-sans" style="background-color: #2d2d2d;">

    <div x-data="{ open: false }">
        @include('admin.layouts.header')

        <main class="container mx-auto px-4 py-8">
            @yield('content')
        </main>
    </div>

</body>

</html>

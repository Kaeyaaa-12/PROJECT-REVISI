<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Menambahkan font Cinzel untuk tampilan yang lebih elegan --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap" rel="stylesheet">
    <style>
        .login-bg {
            background-image: url('{{ asset('assets/images/bglogin.png') }}');
            background-size: cover;
            background-position: center;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center login-bg p-4">

        {{-- Menggabungkan Teks, Logo, dan Form dalam satu container modern --}}
        <div
            class="bg-black bg-opacity-50 p-8 rounded-lg shadow-2xl w-full max-w-md text-center border-2 border-yellow-500/50">

            {{-- Teks "Amira Collections" --}}
            <h2 class="text-3xl font-bold text-yellow-400 mb-2 font-cinzel tracking-widest">
                Amira Collections
            </h2>

            {{-- Logo yang diperbesar --}}
            <img src="{{ asset('assets/images/logoamira.png') }}" alt="Amira Collections Logo"
                class="w-40 h-40 mx-auto mb-4">

            @if ($errors->any())
                <div class="text-red-500 text-sm mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="text-sm font-bold text-gray-400 text-left block">EMAIL</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="password" class="text-sm font-bold text-gray-400 text-left block">PASSWORD</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                </div>

                <div class="text-right">
                    <a href="{{ route('admin.password.request') }}"
                        class="text-sm text-yellow-400 hover:text-yellow-300 underline">
                        Lupa Password?
                    </a>
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 font-bold text-black bg-yellow-500 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-transform transform hover:scale-105">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

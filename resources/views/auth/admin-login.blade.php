<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-bg {
            background-image: url('{{ asset('assets/images/bglogin.png') }}');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center login-bg">
        <div class="w-full max-w-sm p-8 space-y-6 bg-black bg-opacity-60 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold text-center text-yellow-500">ADMIN LOGIN</h2>

            @if ($errors->any())
                <div class="text-red-500 text-sm">
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
                    <label for="email" class="text-sm font-bold text-gray-400">EMAIL</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                </div>

                <div>
                    <label for="password" class="text-sm font-bold text-gray-400">PASSWORD</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md focus:border-yellow-500 focus:ring focus:ring-yellow-500 focus:ring-opacity-50">
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 font-bold text-black bg-yellow-500 rounded-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        LOGIN
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Reset Password</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <div
            class="bg-black bg-opacity-50 p-8 rounded-lg shadow-2xl w-full max-w-md text-center border-2 border-yellow-500/50">
            <h2 class="text-3xl font-bold text-yellow-400 mb-6 font-cinzel tracking-widest">
                Reset Password Admin
            </h2>

            <form method="POST" action="{{ route('admin.password.update') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div>
                    <label for="email" class="text-sm font-bold text-gray-400 text-left block">EMAIL</label>
                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required
                        readonly
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md">
                </div>

                <div>
                    <label for="password" class="text-sm font-bold text-gray-400 text-left block">PASSWORD BARU</label>
                    <input id="password" type="password" name="password" required
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md focus:border-yellow-500 focus:ring-yellow-500">
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation"
                        class="text-sm font-bold text-gray-400 text-left block">KONFIRMASI PASSWORD</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        class="w-full p-2 mt-1 text-gray-100 bg-gray-700 bg-opacity-50 border border-gray-600 rounded-md focus:border-yellow-500 focus:ring-yellow-500">
                </div>

                <div>
                    <button type="submit"
                        class="w-full py-2 px-4 font-bold text-black bg-yellow-500 rounded-md hover:bg-yellow-600">
                        RESET PASSWORD
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

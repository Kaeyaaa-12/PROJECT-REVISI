<header class="bg-black shadow-lg">
    <div class="container mx-auto px-6 lg:px-8">
        <nav class="flex items-center justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('admin.koleksi.premium') }}" class="flex items-center space-x-4 rtl:space-x-reverse">
                    <img src="{{ asset('assets/images/logoamira.png') }}" class="h-14" alt="Amira Collections Logo" />
                    {{-- FONT KHUSUS HANYA UNTUK TEKS INI --}}
                    <span
                        class="font-cinzel self-center text-2xl font-bold tracking-widest whitespace-nowrap text-white">AMIRA
                        COLLECTIONS</span>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-10">
                {{-- Font standar untuk menu navigasi --}}
                <a href="{{ route('admin.koleksi.premium') }}"
                    class="nav-link font-semibold transition-colors duration-300 {{ request()->routeIs('admin.koleksi.premium*') ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-400' }}">
                    KOLEKSI PREMIUM
                </a>
                <a href="{{ route('admin.koleksi.original') }}"
                    class="nav-link font-semibold transition-colors duration-300 {{ request()->routeIs('admin.koleksi.original*') ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-400' }}">
                    KOLEKSI ORIGINAL
                </a>
                <a href="{{ route('admin.aksesoris') }}"
                    class="nav-link font-semibold transition-colors duration-300 {{ request()->routeIs('admin.aksesoris*') ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-400' }}">
                    AKSESORIS
                </a>
            </div>

            <div class="flex items-center space-x-4">
                <div class="relative hidden sm:block">
                    <input type="text"
                        class="bg-gray-800 text-white rounded-full py-2 pl-10 pr-4 w-64 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        placeholder="Search...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white font-semibold">Logout</button>
                </form>
            </div>
        </nav>
    </div>
</header>

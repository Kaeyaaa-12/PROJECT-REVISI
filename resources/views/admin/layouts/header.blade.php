<header class="bg-black shadow-lg">
    <div class="container mx-auto px-6 lg:px-8">
        <nav class="flex items-center justify-between h-20">
            {{-- Logo dan Nama Brand --}}
            <div class="flex items-center">
                <a href="{{ route('admin.koleksi.premium') }}" class="flex items-center space-x-4 rtl:space-x-reverse">
                    <img src="{{ asset('assets/images/logoamira.png') }}" class="h-14" alt="Amira Collections Logo" />
                    <span
                        class="font-cinzel self-center text-2xl font-bold tracking-widest whitespace-nowrap text-white">AMIRA
                        COLLECTIONS</span>
                </a>
            </div>

            {{-- Menu Navigasi Utama --}}
            <div class="hidden md:flex items-center space-x-10">
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

            {{-- Pencarian dan Tombol Logout --}}
            <div class="flex items-center space-x-6">
                {{-- Form Pencarian dengan Warna Background Baru --}}
                <form action="{{ route('admin.search') }}" method="GET" class="relative hidden sm:block group">
                    <input type="text" name="query"
                        class="bg-[#2d2d2d] text-white rounded-full py-2 pl-10 pr-4 w-64 border border-transparent focus:outline-none focus:ring-2 focus:ring-yellow-500 transition-all duration-300 ease-in-out group-hover:border-yellow-500"
                        placeholder="Cari koleksi...">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </form>

                {{-- Tombol Logout --}}
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                        class="flex items-center space-x-2 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zM15.707 6.293a1 1 0 00-1.414 0L12 8.586V3a1 1 0 10-2 0v5.586l-2.293-2.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l4-4a1 1 0 000-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </nav>
    </div>
</header>

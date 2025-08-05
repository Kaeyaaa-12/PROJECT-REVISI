<header class="bg-black shadow-lg">
    <div class="container mx-auto px-4">
        <nav class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-white tracking-wider">AMIRA
                    COLLECTION</a>
                <div class="hidden md:flex ml-10 space-x-8">
                    <a href="{{ route('admin.koleksi.premium') }}" class="text-white font-semibold">Koleksi Premium</a>
                    <a href="{{ route('admin.koleksi.original') }}" class="text-white font-semibold">Koleksi Original</a>
                    <a href="{{ route('admin.aksesoris') }}" class="text-gray-300 hover:text-white">Aksesoris</a>
                </div>
            </div>
            <div class="flex items-center">
                <div class="relative">
                    <input type="text"
                        class="bg-gray-800 text-white rounded-full py-2 px-4 focus:outline-none focus:ring-2 focus:ring-yellow-500"
                        placeholder="Search...">
                </div>
                <form method="POST" action="{{ route('admin.logout') }}" class="ml-4">
                    @csrf
                    <button type="submit" class="text-gray-300 hover:text-white">Logout</button>
                </form>
            </div>
        </nav>
    </div>
</header>

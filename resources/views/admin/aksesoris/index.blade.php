@extends('admin.layouts.app')

@section('title', 'Aksesoris')

@section('content')
    <div class="flex justify-between items-center mb-12">
        <div class="text-center w-full">
            <h1 class="text-4xl font-bold">Aksesoris</h1>
            <p class="text-gray-400 mt-2">Halaman Kelola Aksesoris</p>
        </div>
        <a href="{{ route('admin.aksesoris.create') }}"
            class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded flex-shrink-0">
            Tambah Aksesoris
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @forelse ($accessories as $accessory)
            <div
                class="block bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                <a href="{{ route('admin.aksesoris.detail', $accessory) }}">
                    <img src="{{ $accessory->image ? asset('storage/' . $accessory->image) : 'https://via.placeholder.com/300' }}"
                        alt="{{ $accessory->name }}" class="w-full h-64 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{ route('admin.aksesoris.detail', $accessory) }}">
                        <h3 class="text-xl font-semibold text-center">{{ $accessory->name }}</h3>
                        <p class="text-gray-400 text-center text-sm">{{ $accessory->category }}</p>
                    </a>
                    <div class="flex justify-between items-center mt-2">
                        <p class="text-gray-400 text-sm">Stok: {{ $accessory->stock }}</p>
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.aksesoris.edit', $accessory) }}"
                                class="text-blue-500 hover:text-blue-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <form action="{{ route('admin.aksesoris.destroy', $accessory) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus aksesoris ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                        fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-white col-span-4 text-center">Belum ada aksesoris.</p>
        @endforelse
    </div>
    <div class="mt-8">
        {{ $accessories->links() }}
    </div>
@endsection

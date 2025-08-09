@extends('admin.layouts.app')

@section('title', 'Hasil Pencarian')

@section('content')
    <div style="background-color: #2d2d2d;" class="p-4 sm:p-8 rounded-lg">
        <div class="text-center w-full mb-12">
            <h1 class="text-2xl sm:text-4xl font-bold">Hasil Pencarian untuk "{{ $query }}"</h1>
        </div>

        {{-- Hasil Koleksi Premium --}}
        <h2 class="text-xl sm:text-2xl font-bold mb-4 border-b border-gray-700 pb-2">Koleksi Premium</h2>
        @if ($premiumResults->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">
                @foreach ($premiumResults as $collection)
                    <div style="background-color: #242424;"
                        class="block rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <a href="{{ route('admin.koleksi.premium.detail', $collection) }}">
                            <img src="{{ $collection->image ? asset('storage/' . $collection->image) : 'https://via.placeholder.com/300' }}"
                                alt="{{ $collection->name }}" class="w-full h-64 object-cover">
                        </a>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-center">{{ $collection->name }}</h3>
                            <p class="text-gray-400 text-center text-sm">{{ $collection->category }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-white text-center mb-8">Tidak ada hasil ditemukan di Koleksi Premium.</p>
        @endif

        {{-- Hasil Koleksi Original --}}
        <h2 class="text-xl sm:text-2xl font-bold mb-4 border-b border-gray-700 pb-2">Koleksi Original</h2>
        @if ($originalResults->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mb-8">
                @foreach ($originalResults as $collection)
                    <div style="background-color: #242424;"
                        class="block rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <a href="{{ route('admin.koleksi.original.detail', $collection) }}">
                            <img src="{{ $collection->image ? asset('storage/' . $collection->image) : 'https://via.placeholder.com/300' }}"
                                alt="{{ $collection->name }}" class="w-full h-64 object-cover">
                        </a>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-center">{{ $collection->name }}</h3>
                            <p class="text-gray-400 text-center text-sm">{{ $collection->category }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-white text-center mb-8">Tidak ada hasil ditemukan di Koleksi Original.</p>
        @endif

        {{-- Hasil Aksesoris --}}
        <h2 class="text-xl sm:text-2xl font-bold mb-4 border-b border-gray-700 pb-2">Aksesoris</h2>
        @if ($accessoryResults->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($accessoryResults as $accessory)
                    <div style="background-color: #242424;"
                        class="block rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                        <a href="{{ route('admin.aksesoris.detail', $accessory) }}">
                            <img src="{{ $accessory->image ? asset('storage/' . $accessory->image) : 'https://via.placeholder.com/300' }}"
                                alt="{{ $accessory->name }}" class="w-full h-64 object-cover">
                        </a>
                        <div class="p-4">
                            <h3 class="text-xl font-semibold text-center">{{ $accessory->name }}</h3>
                            <p class="text-gray-400 text-center text-sm">{{ $accessory->category }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-white text-center">Tidak ada hasil ditemukan di Aksesoris.</p>
        @endif
    </div>
@endsection

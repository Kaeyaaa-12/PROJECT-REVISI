@extends('admin.layouts.app')

@section('title', 'Koleksi Original')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold">Koleksi Original</h1>
        <p class="text-gray-400 mt-2">Halaman Kelola Koleksi Original</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <img src="https://via.placeholder.com/300" alt="Koleksi 2" class="w-full h-64 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold">002</h3>
                <p class="text-gray-400 text-sm">Stok: 12</p>
            </div>
        </div>
    </div>
@endsection

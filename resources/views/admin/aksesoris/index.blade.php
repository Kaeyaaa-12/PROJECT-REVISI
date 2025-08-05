@extends('admin.layouts.app')

@section('title', 'Aksesoris')

@section('content')
    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold">Aksesoris</h1>
        <p class="text-gray-400 mt-2">Halaman Kelola AKsesoris</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg">
            <img src="https://via.placeholder.com/300" alt="Aksesoris 1" class="w-full h-64 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold">Aksesoris A</h3>
                <p class="text-gray-400 text-sm">Stok: 25</p>
            </div>
        </div>
    </div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Edit Koleksi Premium')

@section('content')
    <h1 class="text-4xl font-bold text-center mb-8">Edit Koleksi Premium</h1>

    <div class="bg-gray-800 p-8 rounded-lg shadow-lg max-w-2xl mx-auto">
        <form action="{{ route('admin.koleksi.premium.update', $collection) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-300 mb-2">Nama Koleksi</label>
                <input type="text" name="name" id="name"
                    class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white"
                    value="{{ old('name', $collection->name) }}" required>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-gray-300 mb-2">Kategori</label>
                <input type="text" name="category" id="category"
                    class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white"
                    value="{{ old('category', $collection->category) }}" required>
            </div>
            <div class="mb-4">
                <label for="stock" class="block text-gray-300 mb-2">Stok</label>
                <input type="number" name="stock" id="stock"
                    class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white"
                    value="{{ old('stock', $collection->stock) }}" required>
            </div>
            <div class="mb-6">
                <label for="image" class="block text-gray-300 mb-2">Gambar (Kosongkan jika tidak ingin diubah)</label>
                @if ($collection->image)
                    <img src="{{ asset('storage/' . $collection->image) }}" alt="{{ $collection->name }}"
                        class="w-32 h-32 object-cover rounded mb-4">
                @endif
                <input type="file" name="image" id="image"
                    class="w-full bg-gray-700 border border-gray-600 rounded-md py-2 px-3 text-white">
            </div>
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.koleksi.premium') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Update</button>
            </div>
        </form>
    </div>
@endsection

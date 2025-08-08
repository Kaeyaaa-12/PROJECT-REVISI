<?php

namespace App\Http\Controllers;

use App\Models\OriginalCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OriginalCollectionController extends Controller
{
    public function index()
    {
        $collections = OriginalCollection::latest()->paginate(12);
        return view('admin.original.index', compact('collections'));
    }

    public function create()
    {
        return view('admin.original.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('original_collections', 'public');
        }

        OriginalCollection::create([
            'name' => $request->name,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.koleksi.original')->with('success', 'Koleksi original berhasil ditambahkan.');
    }

    // ... (method lainnya akan ditambahkan di fase berikutnya)
    public function show(OriginalCollection $collection)
{
    $collection->load('renters');

    $rentedDates = $collection->renters->pluck('rental_date')->map(function ($date) {
        return $date->format('Y-m-d');
    })->toArray();

    return view('admin.original.detail', compact('collection', 'rentedDates'));
}

public function edit(OriginalCollection $collection)
{
    return view('admin.original.edit', compact('collection'));
}

public function update(Request $request, OriginalCollection $collection)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    $imagePath = $collection->image;
    if ($request->hasFile('image')) {
        if ($imagePath) {
            Storage::disk('public')->delete($imagePath);
        }
        $imagePath = $request->file('image')->store('original_collections', 'public');
    }

    $collection->update([
        'name' => $request->name,
        'category' => $request->category,
        'stock' => $request->stock,
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.koleksi.original')->with('success', 'Koleksi original berhasil diperbarui.');
}

public function destroy(OriginalCollection $collection)
{
    if ($collection->image) {
        Storage::disk('public')->delete($collection->image);
    }

    $collection->delete();

    return redirect()->route('admin.koleksi.original')->with('success', 'Koleksi original berhasil dihapus.');
}
}

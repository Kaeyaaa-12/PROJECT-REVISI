<?php

namespace App\Http\Controllers;

use App\Models\PremiumCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PremiumCollectionController extends Controller
{
    // Method ini yang dipanggil oleh route dan mengirimkan variabel $collections
    public function index()
    {
        $collections = PremiumCollection::latest()->paginate(12);
        return view('admin.premium.index', compact('collections'));
    }

    // Menampilkan form untuk membuat koleksi baru
    public function create()
    {
        return view('admin.premium.create');
    }

    // Menyimpan koleksi baru ke database
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
            $imagePath = $request->file('image')->store('premium_collections', 'public');
        }

        PremiumCollection::create([
            'name' => $request->name,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.koleksi.premium')->with('success', 'Koleksi premium berhasil ditambahkan.');
    }

    // Menampilkan detail satu koleksi
    public function show(PremiumCollection $collection)
    {
        $collection->load('renters');

        $rentedDates = $collection->renters->pluck('rental_date')->map(function ($date) {
            return $date->format('Y-m-d');
        })->toArray();

        return view('admin.premium.detail', compact('collection', 'rentedDates'));
    }

    // Menampilkan form untuk mengedit koleksi
    public function edit(PremiumCollection $collection)
    {
        return view('admin.premium.edit', compact('collection'));
    }

    // Memperbarui koleksi di database
    public function update(Request $request, PremiumCollection $collection)
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
            $imagePath = $request->file('image')->store('premium_collections', 'public');
        }

        $collection->update([
            'name' => $request->name,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.koleksi.premium')->with('success', 'Koleksi premium berhasil diperbarui.');
    }

    // Menghapus koleksi dari database
    public function destroy(PremiumCollection $collection)
    {
        if ($collection->image) {
            Storage::disk('public')->delete($collection->image);
        }

        $collection->delete();

        return redirect()->route('admin.koleksi.premium')->with('success', 'Koleksi premium berhasil dihapus.');
    }
}
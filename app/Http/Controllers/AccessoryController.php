<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AccessoryController extends Controller
{
    public function index()
    {
        $accessories = Accessory::latest()->paginate(12);
        return view('admin.aksesoris.index', compact('accessories'));
    }

    public function create()
    {
        return view('admin.aksesoris.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('accessories', 'public');
        }

        Accessory::create([
            'name' => $request->name,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.aksesoris')->with('success', 'Aksesoris berhasil ditambahkan.');
    }

    public function show(Accessory $accessory)
    {
        $accessory->load('renters');
        $rentedDates = $accessory->renters->pluck('rental_date')->map(function ($date) {
            return $date->format('Y-m-d');
        })->toArray();

        return view('admin.aksesoris.detail', compact('accessory', 'rentedDates'));
    }

    public function edit(Accessory $accessory)
    {
        return view('admin.aksesoris.edit', compact('accessory'));
    }

    public function update(Request $request, Accessory $accessory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $accessory->image;
        if ($request->hasFile('image')) {
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('accessories', 'public');
        }

        $accessory->update([
            'name' => $request->name,
            'category' => $request->category,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.aksesoris')->with('success', 'Aksesoris berhasil diperbarui.');
    }

    public function destroy(Accessory $accessory)
    {
        if ($accessory->image) {
            Storage::disk('public')->delete($accessory->image);
        }
        $accessory->delete();
        return redirect()->route('admin.aksesoris')->with('success', 'Aksesoris berhasil dihapus.');
    }
}

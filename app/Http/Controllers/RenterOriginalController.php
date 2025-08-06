<?php

namespace App\Http\Controllers;

use App\Models\RenterOriginal;
use App\Models\OriginalCollection;
use Illuminate\Http\Request;

class RenterOriginalController extends Controller
{
    public function store(Request $request, OriginalCollection $collection)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rental_date' => 'required|date',
        ]);

        $collection->renters()->create([
            'name' => $request->name,
            'rental_date' => $request->rental_date,
        ]);

        return back()->with('success', 'Penyewa berhasil ditambahkan.');
    }

    public function destroy(RenterOriginal $renter)
    {
        $renter->delete();
        return back()->with('success', 'Penyewa berhasil dihapus.');
    }
}
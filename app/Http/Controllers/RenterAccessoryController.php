<?php

namespace App\Http\Controllers;

use App\Models\Accessory;
use App\Models\RenterAccessory;
use Illuminate\Http\Request;

class RenterAccessoryController extends Controller
{
    public function store(Request $request, Accessory $accessory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'rental_date' => 'required|date',
        ]);

        $accessory->renters()->create([
            'name' => $request->name,
            'rental_date' => $request->rental_date,
        ]);

        return back()->with('success', 'Penyewa berhasil ditambahkan.');
    }

    public function destroy(RenterAccessory $renter)
    {
        $renter->delete();
        return back()->with('success', 'Penyewa berhasil dihapus.');
    }
}
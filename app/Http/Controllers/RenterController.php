<?php
namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\PremiumCollection;
use Illuminate\Http\Request;

class RenterController extends Controller
{
    public function store(Request $request, PremiumCollection $collection)
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

    public function destroy(Renter $renter)
    {
        $renter->delete();
        return back()->with('success', 'Penyewa berhasil dihapus.');
    }
}
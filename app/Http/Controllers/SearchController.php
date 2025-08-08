<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PremiumCollection;
use App\Models\OriginalCollection;
use App\Models\Accessory;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $premiumResults = PremiumCollection::where('name', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->get();

        $originalResults = OriginalCollection::where('name', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->get();

        $accessoryResults = Accessory::where('name', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->get();

        return view('admin.search.index', [
            'query' => $query,
            'premiumResults' => $premiumResults,
            'originalResults' => $originalResults,
            'accessoryResults' => $accessoryResults,
        ]);
    }
}
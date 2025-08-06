<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenterOriginal extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_collection_id',
        'name',
        'rental_date',
    ];

    protected $casts = [
        'rental_date' => 'date',
    ];

    public function originalCollection()
    {
        return $this->belongsTo(OriginalCollection::class);
    }
}
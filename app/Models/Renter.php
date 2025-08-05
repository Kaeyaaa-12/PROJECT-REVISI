<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    use HasFactory;

    protected $fillable = [
        'premium_collection_id',
        'name',
        'rental_date',
    ];

    protected $casts = [
        'rental_date' => 'date',
    ];

    public function premiumCollection()
    {
        return $this->belongsTo(PremiumCollection::class);
    }
}

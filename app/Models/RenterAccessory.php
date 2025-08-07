<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenterAccessory extends Model
{
    use HasFactory;

    protected $fillable = [
        'accessory_id',
        'name',
        'rental_date',
    ];

    protected $casts = [
        'rental_date' => 'date',
    ];

    public function accessory()
    {
        return $this->belongsTo(Accessory::class);
    }
}
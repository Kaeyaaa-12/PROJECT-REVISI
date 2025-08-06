<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginalCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'stock',
    ];

    public function renters()
    {
        return $this->hasMany(RenterOriginal::class);
    }
}

<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image',
        'stock',
    ];

    // Relasi ke model Penyewa (akan dibuat di Fase 3)
    public function renters()
    {
        return $this->hasMany(Renter::class);
    }
}
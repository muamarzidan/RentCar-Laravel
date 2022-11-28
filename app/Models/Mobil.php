<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mobil',
        'foto_mobil',
        'merk',
        'harga',
        'deskripsi',
        'rented',
    ];

    public function perentalan()
    {
        return $this->hasMany(Perentalan::class);
    }
}

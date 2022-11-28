<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perentalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'user_id',
        'nama',
        'tipe_kendaraan',
        'merk_kendaraan',
        'foto_sim',
        'foto_ktp',
        'tanggal_pinjam',
        'lama_rental',
        'harga',
        'total_harga',
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

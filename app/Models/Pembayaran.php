<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'kendaraan_id',
        'user_id',
        'nama',
        'nama_kendaraan',
        'total_harga',
        'bukti_pembayaran'
    ];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Perentalan()
    {
        return $this->belongsTo(Perentalan::class);
    }
}

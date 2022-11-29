<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metode extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'metode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}

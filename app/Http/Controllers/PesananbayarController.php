<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PesananbayarController extends Controller
{
    public function index()
    {
        $perentalan = Pembayaran::all();

        return response()->json([
            'success' => true,
            'message' => 'List Semua pembayaran yang berhasil',
            'data' => $perentalan
        ], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class CategorylowController extends Controller
{
    public function index(Request $request)
    {
        $categorylow = Mobil::where('harga', '<', 1000000)->get();
        // $categorylow = Mobil::where(['harga', '<=', 1000000],['rented', '1'])->get( );
        return response()->json([
            'success' => true,
            'message' => 'List Semua kendaraan Terjangkau',
            'data' => $categorylow
        ], 200);
    }
}

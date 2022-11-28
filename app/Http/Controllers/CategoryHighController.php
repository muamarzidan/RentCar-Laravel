<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class CategoryHighController extends Controller
{
    public function index()
    {
        {
            $categoryhigh = Mobil::where('harga', '>', 1000000)->get();
            // $zero = $categorylow::where('rented', '1')->get();
            return response()->json([
                'success' => true,
                'message' => 'List Semua kendaraan Terjangkau',
                'data' => $categoryhigh
            ], 200);
        }
    }
}

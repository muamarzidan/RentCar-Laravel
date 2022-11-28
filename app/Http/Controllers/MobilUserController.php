<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilUserController extends Controller
{
    public function index()
    {

        $getcar = Mobil::where('rented', '1')->get();
        if($getcar == null) {
            return response()->json([
                'succes' => true,
                'message' => 'Daftar data kendaraan mobil yang dapat disewa belum ada',
                'data' => $getcar
            ], 201);
        } else if ($getcar) {
            return response()->json([
                'succes' => true,
                'message' => 'Daftar data kendaraan mobil yang dapat di sewa',
                'data' => $getcar
            ], 201);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Data kendaraan mobil yang dapat di sewa tidak ditemukan',
                'data' => $getcar
            ], 404);
        }
    }

    public function show($id)
    {
        $getcar = Mobil::find($id);
        if($getcar) {
            return response()->json([
                'succes' => true,
                'message' => 'Detail data kendaraan mobil',
                'data' => $getcar
            ], 200);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Data kendaraan mobil tidak ditemukan',
                'data' => $getcar
            ], 200);
        }
    }
    
}

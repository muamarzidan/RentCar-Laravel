<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use App\Models\Perentalan;
use App\Models\Mobil;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        if($user->role == 'user') {

            $sewa = Perentalan::create([
                'kendaraan_id' => $request->kendaraan_id,
                'user_id' => $user->id,
                'nama' => $request->nama,
                'tipe_kendaraan' => $request->tipe_kendaraan,
                'merk_kendaraan' => $request->merk_kendaraan,
                'foto_sim' => $request->foto_sim,
                'foto_ktp' => $request->foto_ktp,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'lama_rental' => $request->lama_rental,
                'harga' => $request->harga,
                'total_harga' => $request->harga * $request->lama_rental,
            ]);

            Mobil::where('id', $request->kendaraan_id)->update(['rented' => '0']);

            $sewa->save();

            return response()->json([
                'succes' => true,
                'message' => 'Selamat anda berhasil melakukan pemesanan',
                'data' => $sewa
            ], 201);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Order gagal, anda bukan user',
                'data' => ''
            ], 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

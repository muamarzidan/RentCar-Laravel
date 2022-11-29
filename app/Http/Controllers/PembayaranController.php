<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
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
        ///
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
           
            $bayar = Pembayaran::create([
                'kendaraan_id' => $request->kendaraan_id,
                'user_id' => $user->id,
                'nama' => $request->nama,
                'nama_kendaraan' => $request->nama_kendaraan,
                'total_harga' => $request->total_harga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'bukti_pembayaran' => $request->bukti_pembayaran,
            ]);

            $bayar->save();

            return response()->json([
                'succes' => true,
                'message' => 'Selamat anda berhasil melakukan pembayaran, kendaraan akan dikirimkan ke alamat anda',
                'data' => $bayar
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

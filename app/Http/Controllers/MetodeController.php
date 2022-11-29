<?php

namespace App\Http\Controllers;

use App\Models\Metode;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Metodbayar = Metode::all();
        return response()->json([
            'success' => true,
            'message' => 'List Semua Metode Pembayaran',
            'data' => $Metodbayar
        ], 200);
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
        if ($user->role == 'admin') {
            $Metodbayar = Metode::create([
                'metode' => $request->metode,
            ]);

            $Metodbayar->save();

            if ($Metodbayar) {
                return response()->json([
                    'success' => true,
                    'message' => 'Metode Pembayaran Berhasil Ditambahkan',
                    'data' => $Metodbayar
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Metode Pembayaran Gagal Ditambahkan',
                    'data' => $Metodbayar
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Maaf anda tidak bisa menambahkan data ini, karena anda bukan admin',
            ], 400);
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
        $user = auth()->user();
        if ($user->role == 'admin') {
            $Metodbayar = Metode::find($id)->update([
                'metode' => $request->metode,
            ]);

            if ($Metodbayar) {
                return response()->json([
                    'success' => true,
                    'message' => 'Metode Pembayaran Berhasil Diubah',
                    'data' => $Metodbayar
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Metode Pembayaran Gagal Diubah',
                    'data' => $Metodbayar
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Maaf anda tidak bisa mengubah data ini, karena anda bukan admin',
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        if ($user->role == 'admin') {
            $Metodbayar = Metode::find($id)->delete();

            if ($Metodbayar) {
                return response()->json([
                    'success' => true,
                    'message' => 'Metode Pembayaran Berhasil Dihapus',
                    'data' => $Metodbayar
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Metode Pembayaran Gagal Dihapus',
                    'data' => $Metodbayar
                ], 400);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Maaf anda tidak bisa menghapus data ini, karena anda bukan admin',
            ], 400);
        }
    }
}

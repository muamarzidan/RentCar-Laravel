<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        if($user->role == 'admin') {
            $getcar = Mobil::all();
            if($getcar === 0) {
                return response()->json([
                    'succes' => true,
                    'message' => 'Daftar data kendaraan mobil yang dapat disewa belum ada',
                    'data' => $getcar
                ], 200);
            } else if($getcar) {
                return response()->json([
                    'succes' => true,
                    'message' => 'Daftar data kendaraan mobil yang dapat di sewa',
                    'data' => $getcar
                ], 400);
            } else {
                return response()->json([
                    'succes' => false,
                    'message' => 'Gagal menampilkan data kendaraan mobil',
                    'data' => $getcar
                ], 400);
            }
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Maaf anda tidak bisa melihat data ini, karena anda bukan admin',
            ], 400);
        }
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
            $request->validate([
                'nama_mobil' => 'required',
                'foto_mobil' => 'required',
                'merk' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
            ]);

            $car = Mobil::create([
                'nama_mobil' => $request->nama_mobil,
                'foto_mobil' => $request->foto_mobil,
                'merk' => $request->merk,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'rented' => 1,
            ]);

            if($car) {
                return response()->json([
                    'succes' => true,
                    'message' => 'Data kendaraan mobil berhasil di tambahkan',
                    'data' => $car
                ], 200);
            } else {
                return response()->json([
                    'succes' => false,
                    'message' => 'Data kendaraan mobil gagal di tambahkan',
                    'data' => $car
                ], 400);
            }
        } else {
            return response()->json([
                'succes' => false,
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
        $user = auth()->user();

        if($user->role == 'admin') {
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
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Maaf anda tidak bisa melihat data ini, karena anda bukan admin',
            ], 400);
        }
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
            $request->validate([
                'nama_mobil' => 'required',
                'merk' => 'required',
                'harga' => 'required',
                'deskripsi' => 'required',
            ]);

            $carup = Mobil::find($id)->update([
                'nama_mobil' => $request->nama_mobil,
                'merk' => $request->merk,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'rented' => 1,
            ]);
            if($carup) {
                return response()->json([
                    'succes' => true,
                    'message' => 'Data kendaraan mobil berhasil di update',
                    'data' => $carup
                ], 200);
            } else {
                return response()->json([
                    'succes' => false,
                    'message' => 'Data kendaraan mobil gagal di update',
                    'data' => $carup
                ], 400);
            }
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Maaf anda tidak bisa mengupdate data ini, karena anda bukan admin',
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
            
            $cardes = Mobil::find($id)->delete();

            if($cardes) {
                return response()->json([
                    'succes' => true,
                    'message' => 'Data kendaraan mobil berhasil di hapus',
                    'data' => $cardes
                ], 200);
            } else {
                return response()->json([
                    'succes' => false,
                    'message' => 'Data kendaraan mobil gagal di hapus',
                    'data' => $cardes
                ], 400);
            }
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Maaf anda tidak bisa menghapus data ini, karena anda bukan admin',
            ], 400); 
        }
    }
}

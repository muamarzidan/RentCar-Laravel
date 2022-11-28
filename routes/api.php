<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\MobilUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryHighController;
use App\Http\Controllers\CategorylowController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PerentalanContoroller;
use App\Http\Controllers\PesananbayarController;
use App\Http\Controllers\PesananController;
use App\Models\Mobil;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::prefix('admin')->group(function () {
        Route::resource('mobil', MobilController::class);
        Route::resource('pesanan', PesananController::class);
        Route::resource('pembayaran', PesananbayarController::class);
    });

    Route::post('rental', [OrderController::class, 'store']);
    Route::post('bayar', [PembayaranController::class, 'store']);
    Route::get('terjangkau', [CategorylowController::class, 'index']);
    Route::get('mahal', [CategoryHighController::class, 'index']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('mobils', [MobilUserController::class, 'index']);
Route::get('mobils/{id}', [MobilUserController::class, 'show']);

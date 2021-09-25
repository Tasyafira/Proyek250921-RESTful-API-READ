<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\Detail_TransaksoController;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/pelanggan', 'PelangganController@show');
Route::post('/pelanggan', 'PelangganController@store');

Route::get('/produk', 'ProdukController@show');
Route::post('/produk', 'ProdukController@store');

Route::get('/petugas', 'PetugasController@show');
Route::post('/petugas', 'PetugasController@store');

Route::get('/transaksi', 'TransaksiController@show');
Route::get('/transaksi/{id_transaksi}', 'TransaksiController@detail');
Route::post('/transaksi', 'TransaksiController@store');

Route::get('/detail_transaksi', 'Detail_TransaksiController@show');
Route::get('/detail_transaksi/{id_detail_transaksi}', 'Detail_TransaksiController@detail');
Route::post('/detail_transaksi', 'Detail_TransaksiController@store');
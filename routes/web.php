<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrgMsukController;
use App\Http\Controllers\BrgKeluarController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function(){
    //Data Master (user)
    Route::get('/user', [UserController::class, 'index'])->can('admin');
    Route::post('/user/store', [UserController::class, 'store'])->can('admin');
    Route::post('/user/{id}/update', [UserController::class, 'update'])->can('admin');
    Route::get('/user/{id}/destroy', [UserController::class, 'destroy'])->can('admin');
    //Data Master (kategori)
    Route::get('/kategori', [KategoriController::class, 'index'])->can('admin');
    Route::post('/kategori/store', [KategoriController::class, 'store'])->can('admin');
    Route::post('/kategori/{id}/update', [KategoriController::class, 'update'])->can('admin');
    Route::get('/kategori/{id}/destroy', [KategoriController::class, 'destroy'])->can('admin');
    //Data Master (barang)
    Route::get('/barang', [BarangController::class, 'index'])->can('admin');
    Route::post('/barang/store', [BarangController::class, 'store'])->can('admin');
    Route::post('/barang/{id}/update', [BarangController::class, 'update'])->can('admin');
    Route::get('/barang/{id}/destroy', [BarangController::class, 'destroy'])->can('admin');
    //Data Laporan
    Route::get('/lap_brg_msk', [LaporanController::class, 'lap_brg_msk'])->can('admin');
    Route::get('/lap_brg_msk/cetak_brg_msk', [LaporanController::class, 'cetak_brg_msk'])->can('admin');

    Route::get('/lap_brg_keluar', [LaporanController::class, 'lap_brg_keluar'])->can('admin');
    Route::get('/lap_brg_keluar/cetak_brg_keluar', [LaporanController::class, 'cetak_brg_keluar'])->can('admin');

    Route::get('/lap_user', [LaporanController::class, 'lap_user'])->can('admin');
    Route::get('/lap_user/cetak_user', [LaporanController::class, 'cetak_user'])->can('admin');

    Route::get('/lap_barang', [LaporanController::class, 'lap_barang'])->can('admin');
    Route::get('/lap_barang/cetak_barang', [LaporanController::class, 'cetak_barang'])->can('admin');

    Route::get('/lap_kategori', [LaporanController::class, 'lap_kategori'])->can('admin');
    Route::get('/lap_kategori/cetak_kategori', [LaporanController::class, 'cetak_kategori'])->can('admin');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [HomeController::class, 'home']);

     //Data Transaksi (Barang Masuk)
     Route::get('/brg_msk', [BrgMsukController::class, 'index'])->can('gudang');
     Route::get('/brg_msk/ajax', [BrgMsukController::class, 'ajax'])->can('gudang');
     Route::get('/brg_msk/create', [BrgMsukController::class, 'create'])->can('gudang');
     Route::post('/brg_msk/store', [BrgMsukController::class, 'store'])->can('gudang');
     
     //Data Transaksi (Barang Keluar)
     Route::get('/brg_keluar', [BrgKeluarController::class, 'index'])->can('gudang');
     Route::get('/brg_keluar/ajax', [BrgKeluarController::class, 'ajax'])->can('gudang');
     Route::get('/brg_keluar/create', [BrgKeluarController::class, 'create'])->can('gudang');
     Route::post('/brg_keluar/store', [BrgKeluarController::class, 'store'])->can('gudang');
});
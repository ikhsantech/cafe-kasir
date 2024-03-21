<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProdukTitipanController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

route::get('/',[HomeController::class,'index']);
route::get('kategori',[HomeController::class,'kategori']);
route::get('tipe',[HomeController::class,'tipe']);
route::get('menu',[HomeController::class,'menu']);
route::get('pemesanan',[HomeController::class,'pemesanan']);
route::get('tentang',[HomeController::class,'tentang']);





Route::resource('kategori', KategoriController::class);
Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');

Route::resource('tipe', TipeController::class);
Route::resource('menu', MenuController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class,'faktur']);
Route::resource('stok', StokController::class);
Route::resource('meja', MejaController::class);
Route::resource('pelanggan', PelangganController::class);
Route::resource('titipan', ProdukTitipanController::class);






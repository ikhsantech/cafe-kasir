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
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataController;




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

Route::get('/', function () {
    return redirect()->route('login');
});

// Login
Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/login', [UserController::class, 'cekLogin'])->name('cekLogin');
Route::resource('/auth', LoginController::class);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// Route Untuk yang sudah login
// Route::group(['middleware'=>'auth'],function(){

// });


route::get('/home', [HomeController::class, 'index']);
route::get('dashboard', [HomeController::class, 'index']);
route::get('kategori', [HomeController::class, 'kategori']);
route::get('tipe', [HomeController::class, 'tipe']);
route::get('menu', [HomeController::class, 'menu']);
route::get('pemesanan', [HomeController::class, 'pemesanan']);
route::get('tentang', [HomeController::class, 'tentang']);
route::get('contact', [HomeController::class, 'contact']);




// Kategori
Route::resource('kategori', KategoriController::class);
Route::get('export/kategori', [KategoriController::class, 'exportData'])->name('export-kategori');
Route::post('import-kategori', [KategoriController::class, 'importData']);
Route::get('generate/kategori', [KategoriController::class, 'downloadspdf'])->name('kategori-pdf');

// Tipe/ Jenis
Route::resource('tipe', TipeController::class);
Route::get('export/tipe', [TipeController::class, 'exportData'])->name('export-tipe');
Route::post('import-tipe', [TipeController::class, 'importData']);
Route::get('generate/tipe', [TipeController::class, 'downloadspdf'])->name('tipe-pdf');


// Stok
Route::resource('stok', StokController::class);
Route::get('export/stok', [StokController::class, 'exportData'])->name('export-stok');
Route::post('import-stok', [StokController::class, 'importData']);
Route::get('generate/stok', [StokController::class, 'downloadspdf'])->name('stok-pdf');


// Menu
Route::resource('menu', MenuController::class);
Route::get('export/menu', [MenuController::class, 'exportData'])->name('export-menu');
Route::post('import-menu', [MenuController::class, 'importData']);
Route::get('generate/menu', [MenuController::class, 'downloadspdf'])->name('menu-pdf');

// Pelanggan
Route::resource('pelanggan', PelangganController::class);
Route::get('export/pelanggan', [PelangganController::class, 'exportData'])->name('export-pelanggan');
Route::post('import-pelanggan', [PelangganController::class, 'importData']);
Route::get('generate/pelanggan', [PelangganController::class, 'downloadspdf'])->name('pelanggan-pdf');

// Meja
Route::resource('meja', MejaController::class);
Route::get('export/meja', [MejaController::class, 'exportData'])->name('export-meja');
Route::post('import-meja', [MejaController::class, 'importData']);
Route::get('generate/meja', [MejaController::class, 'downloadspdf'])->name('meja-pdf');

// Pemesanan
Route::resource('pemesanan', PemesananController::class);

// Titipan TO
Route::resource('titipan', ProdukTitipanController::class);

// Absensi TO
Route::resource('absensi', AbsensiController::class);
Route::get('export/absensi', [AbsensiController::class, 'exportData'])->name('export-absensi');
Route::post('import-absensi', [AbsensiController::class, 'importData']);
Route::get('generate/absensi', [AbsensiController::class, 'downloadspdf'])->name('absensi-pdf');

// Transaksi /faktur
Route::resource('transaksi', TransaksiController::class);
Route::get('nota/{nofaktur}', [TransaksiController::class, 'faktur']);

// Grafik
Route::get('grafik', [DataController::class, 'index']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StockJadiController;
use App\Http\Controllers\QualitasController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\LaporanController;


use App\Exports\LaporanExport;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Facades\App;
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
    return redirect('/login');
});
Route::get('/laporan/export', function () {
    $excel = App::make(Excel::class);
    return $excel->download(new LaporanExport, 'laporan.xlsx');
})->name('laporan.export');
// login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route Resource untuk Supplier
    Route::resource('suppliers', SupplierController::class);

    // Route Resource untuk Penerimaan
    Route::resource('penerimaans', PenerimaanController::class);

    // Route Resource untuk Produksi
    Route::resource('produksis', ProduksiController::class);

    // Route Resource untuk Stock
    Route::resource('stocks', StockController::class);

    // Route Resource untuk Stock Jadi
    Route::resource('stockJadi', StockJadiController::class);

    // Route Resource untuk Qualitas
    Route::resource('qualitases', QualitasController::class);

    // Route Resource untuk Pengiriman
    Route::resource('pengiriman', PengirimanController::class);

    // Route Resource untuk Laporan
    Route::resource('laporans', LaporanController::class);
    // pengguna
    Route::get('/pengguna', [UserController::class, 'index']);
    Route::resource('users', UserController::class);


    // // produksi
    // // Route::get('/produksi', [ProduksiController::class, 'index']);
    // Route::de('produksi', ProduksiController::class);
    // // pengirim
    // Route::get('/pengirim', [PengirimanController::class, 'index']);
    // Route::resource('pengirim', PengirimanController::class);

    // // kualitas
    // Route::get('/kualitas', [KualitasanController::class, 'index']);
    // Route::resource('kualitas', KualitasanController::class);



    // // penerimaan
    // Route::resource('/penerimaan', PenerimaanController::class,);

    // // do
    // Route::resource('/do', DoController::class);

    // Route::resource('/penerimaanTbs', PenerimaanTbsController::class);

    // Route::resource('stok', StokController::class);


    // // produk
    // Route::resource('/produk', ProdukController::class);


    // // laporan
    // Route::resource('/laporan', LaporanController::class);



    // Route::get('/kualitas', [AuthController::class, 'kualitas']);
    Route::get('/sounding', [AuthController::class, 'sounding']);
    Route::get('/rincian-p', [AuthController::class, 'rincian_p']);
    // logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\SatuanController;

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

Route::get('/', function () {
    return view('index');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// Route::get('/login', [AuthController::class,'index'])->name('login');
// Route::post('/cek_login', [AuthController::class, 'cek_login'])->name('check');
// Route::get('/logout', [AuthController::class,'logout'])->name('check');


Route::get('/dashboard', function(){ return view('admin.pages.dashboard.dashboard'); });

Route::get('/user', [UserController::class,'index'])->name('user.index');
Route::post('/user/create', [UserController::class,'create'])->name('user.create');
Route::post('/user/store', [UserController::class,'store'])->name('user.store');
Route::post('/user/update', [UserController::class,'store'])->name('user.update');
Route::get('/user/destroy', [UserController::class,'destroy'])->name('user.destroy');

// Data Main (Return)
Route::get('/return', function(){ return view('admin.pages.return.index'); })->name('return.index');

// Data Main (ReturRusak)
Route::get('/return/rusak', function(){ return view('admin.pages.return.rusak'); })->name('return.rusak');

// Data Main (ReturRepair)
Route::get('/return/repair', function(){ return view('admin.pages.return.repair'); })->name('return.repair');

// Data Master (Bidang)
Route::get('/bidang', [BidangController::class,'bidang'])->name('bidang.bidang');
Route::post('/bidang/create', [BidangController::class,'create'])->name('bidang.create');
Route::post('/bidang/store', [BidangController::class,'store'])->name('bidang.store');

// Data Master (Satuan)
Route::get('/satuan', [SatuanController::class,'satuan'])->name('satuan.satuan');
Route::post('/satuan/create', [SatuanController::class,'create'])->name('satuan.create');
Route::post('/satuan/store', [SatuanController::class,'store'])->name('satuan.store');

// Data Master (Jenis)
Route::get('/jenis', [JenisController::class,'jenis'])->name('jenis.jenis');
Route::post('/jenis/create', [JenisController::class,'create'])->name('jenis.create');
Route::post('/jenis/store', [JenisController::class,'store'])->name('jenis.store');
Route::post('/jenis/destroy', [JenisController::class,'destroy'])->name('jenis.destroy');

// Data Master (Barang)
Route::get('/barang',[BarangController::class,'barang'])->name('barang.barang');
Route::get('/barang/update',[BarangController::class,'update'])->name('barang.update');

require __DIR__.'/auth.php';

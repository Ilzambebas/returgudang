<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\BotTelegramController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataReturnController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ReturnLayakPakaiController;
use App\Http\Controllers\ReturnLayakRepairController;
use App\Http\Controllers\ReturnRusakController;
use App\Http\Controllers\SatuanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/dashboard', function () x{
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
// Route::get('/login', [AuthController::class,'index'])->name('login');
// Route::post('/cek_login', [AuthController::class, 'cek_login'])->name('check');
// Route::get('/logout', [AuthController::class,'logout'])->name('check');


Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    // Route::get('', function(){ return view('admin.pages.dashboard.dashboard'); });
    // user
    Route::get('/user', [UserController::class,'index'])->name('user.index');
    Route::get('/user/create', [UserController::class,'create'])->name('user.create');
    Route::post('/user/store', [UserController::class,'store'])->name('user.store');
    Route::get('/user/edit', [UserController::class,'edit'])->name('user.edit');
    Route::post('/user/update', [UserController::class,'update'])->name('user.update');
    Route::post('/user/destroy', [UserController::class,'destroy'])->name('user.destroy');

    // Data Main (Return)
    Route::prefix('return')->group(function () {
        // data return
        Route::get('data-return/detail-pdf/{id}',[DataReturnController::class,'detailPdf'])->name('data-return.detail.pdf');
        Route::get('data-return/pdf',[DataReturnController::class,'pdf'])->name('data-return.pdf');
        Route::resource('data-return',DataReturnController::class);
        // return layak pakai
        Route::post('return-layak-pakai/tindak-lanjut/post', [ReturnLayakPakaiController::class,'TindakLanjutPost'])->name('return-layak-pakai.tindaklanjutpost');
        Route::get('return-layak-pakai/tindak-lanjut/{id}', [ReturnLayakPakaiController::class,'TindakLanjut'])->name('return-layak-pakai.tindaklanjut');
        // proses pengecekan
        Route::post('return-layak-pakai/proses-pengecekan/post', [ReturnLayakPakaiController::class,'prosesPengecekanPost'])->name('return-layak-pakai.prosesPengecekanPost');
        Route::get('return-layak-pakai/proses-pengecekan/{id}', [ReturnLayakPakaiController::class,'prosesPengecekan'])->name('return-layak-pakai.prosesPengecekan');

        Route::post('return-layak-pakai/destroy-data', [ReturnLayakPakaiController::class,'destroyData'])->name('return-layak-pakai.destroyData');
        Route::resource('return-layak-pakai',ReturnLayakPakaiController::class);
        // return layak repair
        Route::post('return-layak-repair/tindak-lanjut/post', [ReturnLayakRepairController::class,'TindakLanjutPost'])->name('return-layak-repair.tindaklanjutpost');
        Route::get('return-layak-repair/tindak-lanjut/{id}', [ReturnLayakRepairController::class,'TindakLanjut'])->name('return-layak-repair.tindaklanjut');
        // proses pengecekan
        Route::post('return-layak-repair/proses-pengecekan/post', [ReturnLayakRepairController::class,'prosesPengecekanPost'])->name('return-layak-repair.prosesPengecekanPost');
        Route::get('return-layak-repair/proses-pengecekan/{id}', [ReturnLayakRepairController::class,'prosesPengecekan'])->name('return-layak-repair.prosesPengecekan');

        Route::post('return-layak-repair/destroy-data', [ReturnLayakRepairController::class,'destroyData'])->name('return-layak-repair.destroyData');
        Route::resource('return-layak-repair', ReturnLayakRepairController::class);
        // Return Rusak
        // tindak lanjut
        Route::post('return-rusak/tindak-lanjut/post', [ReturnRusakController::class,'TindakLanjutPost'])->name('return-rusak.tindaklanjutpost');
        Route::get('return-rusak/tindak-lanjut/{id}', [ReturnRusakController::class,'TindakLanjut'])->name('return-rusak.tindaklanjut');
        // proses pengecekan
        Route::post('return-rusak/proses-pengecekan/post', [ReturnRusakController::class,'prosesPengecekanPost'])->name('return-rusak.prosesPengecekanPost');
        Route::get('return-rusak/proses-pengecekan/{id}', [ReturnRusakController::class,'prosesPengecekan'])->name('return-rusak.prosesPengecekan');

        Route::post('return-rusak/destroy-data', [ReturnRusakController::class,'destroyData'])->name('return-rusak.destroyData');
        // Route::resource('return-rusak', ReturnRusakController::class);
    });
    Route::get('/return', function(){ return view('admin.pages.return.index'); })->name('return.index');

    // Data Main (ReturRusak)
    Route::get('/return/rusak', function(){ return view('admin.pages.return.rusak'); })->name('return.rusak');

    // Data Main (ReturRepair)
    Route::get('/return/repair', function(){ return view('admin.pages.return.repair'); })->name('return.repair');

    // Data Master (Bidang)
    Route::get('/bidang', [BidangController::class,'bidang'])->name('bidang.bidang');
    Route::post('/bidang/create', [BidangController::class,'create'])->name('bidang.create');
    Route::post('/bidang/store', [BidangController::class,'store'])->name('bidang.store');
    Route::get('bidang/edit',[BidangController::class,'edit'])->name('bidang.edit');
    Route::post('bidang/update',[BidangController::class,'update'])->name('bidang.update');
    Route::post('bidang/destroy', [BidangController::class,'destroy'])->name('bidang.destroy');

    // Data Master (Satuan)
    Route::get('/satuan', [SatuanController::class,'satuan'])->name('satuan.satuan');
    Route::post('/satuan/create', [SatuanController::class,'create'])->name('satuan.create');
    Route::post('/satuan/store', [SatuanController::class,'store'])->name('satuan.store');
    Route::get('satuan/edit',[SatuanController::class,'edit'])->name('satuan.edit');
    Route::post('satuan/update',[SatuanController::class,'update'])->name('satuan.update');
    Route::post('satuan/destroy', [SatuanController::class,'destroy'])->name('satuan.destroy');

    // Data Master (Jenis)
    Route::get('/jenis', [JenisController::class,'jenis'])->name('jenis.jenis');
    Route::get('jenis/edit',[JenisController::class,'edit'])->name('jenis.edit');
    Route::post('jenis/update',[JenisController::class,'update'])->name('jenis.update');
    Route::post('/jenis/create', [JenisController::class,'create'])->name('jenis.create');
    Route::post('/jenis/store', [JenisController::class,'store'])->name('jenis.store');
    Route::post('/jenis/destroy', [JenisController::class,'destroy'])->name('jenis.destroy');

    // Data Master (Barang)
    Route::get('/barang',[BarangController::class,'barang'])->name('barang.barang');
    Route::post('barang/post',[BarangController::class,'store'])->name('barang.store');
    Route::get('barang/edit',[BarangController::class,'edit'])->name('barang.edit');
    Route::post('/barang/update',[BarangController::class,'update'])->name('barang.update');
    Route::post('barang/destroy', [BarangController::class,'destroy'])->name('barang.destroy');

    // laporan
    Route::get('laporan/{id}',[LaporanController::class,'pdf'])->name('laporan.pdf');
    Route::get('laporan',[LaporanController::class,'index'])->name('laporan');

    // telegram
});
Route::resource('return-rusak', ReturnRusakController::class);
Route::get('setWebhook',[BotTelegramController::class,'setWebhook']);
Route::get('test/webhook',[BotTelegramController::class,'commandHandlerWebhook']);



require __DIR__.'/auth.php';

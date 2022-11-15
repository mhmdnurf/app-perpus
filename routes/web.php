<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReturnedController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::resource('data-anggota', MemberController::class)->middleware('auth');
Route::resource('data-buku', BookController::class)->middleware('auth');
Route::resource('kategori', CategoryController::class)->middleware('auth');
Route::resource('rak', RackController::class)->middleware('auth');

Route::resource('data-peminjaman', BorrowController::class)->middleware('auth');
Route::resource('data-pengembalian', ReturnedController::class)->middleware('auth');

Route::get('/anggota/report-cetakAnggota/{tgl_awal}/{tgl_akhir}', [ReportController::class, 'cetakLapAnggota'])->name('report-cetakAnggota')->middleware('auth');
Route::get('/anggota/report', [ReportController::class, 'homeLapAnggota'])->middleware('auth');

Route::get('/buku/report-cetakBuku/{tgl_awal}/{tgl_akhir}', [ReportController::class, 'cetakLapBuku'])->name('report-cetakBuku')->middleware('auth');
Route::get('/buku/report', [ReportController::class, 'homeLapBuku'])->middleware('auth');

Route::get('/pinjam/report-cetakPinjam/{tgl_awal}/{tgl_akhir}', [ReportController::class, 'cetakLapPinjam'])->name('report-cetakPinjam')->middleware('auth');
Route::get('/pinjam/report', [ReportController::class, 'homeLapPinjam'])->middleware('auth');

Route::get('/pengembalian/report-cetakPengembalian/{tgl_awal}/{tgl_akhir}', [ReportController::class, 'cetakLapPengembalian'])->name('report-cetakPengembalian')->middleware('auth');
Route::get('/pengembalian/report', [ReportController::class, 'homeLapPengembalian'])->middleware('auth');

Route::post('/pengembalian/prosesPengembalian', [ReturnedController::class, 'prosesPengembalian'])->name('prosesPengembalian')->middleware('auth');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RackController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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

Route::get('/data-transaksi/data-peminjaman', function () {
    return view('data-transaksi.data-peminjaman.index', [
        'title' => 'Data Peminjaman',
        'active' => 'data-peminjaman'
    ]);
})->middleware('auth');

Route::get('/data-transaksi/data-pengembalian', function () {
    return view('data-transaksi.data-pengembalian.index', [
        'title' => 'Data Pengembalian',
        'active' => 'data-pengembalian'
    ]);
})->middleware('auth');

Route::get('/laporan', function () {
    return view('laporan.index', [
        'title' => 'Laporan',
        'active' => 'laporan'
    ]);
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/profile', function () {
    return view('profile.index', [
        'title' => 'Profile',
        'active' => 'profile'
    ]);
});

Route::resource('data-anggota', MemberController::class)->middleware('auth');
Route::resource('data-buku', BookController::class)->middleware('auth');
Route::resource('kategori', CategoryController::class)->middleware('auth');
Route::get('/kategori/checkSlug', [CategoryController::class, 'checkSlug'])->middleware('auth');
Route::get('/rak/checkSlug', [RackController::class, 'checkSlug'])->middleware('auth');
Route::resource('rak', RackController::class)->middleware('auth');

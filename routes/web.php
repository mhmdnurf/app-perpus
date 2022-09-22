<?php

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

Route::get('/', function () {
    return view('dashboard.index', [
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ]);
});

Route::get('/data-anggota', function () {
    return view('data-anggota.index', [
        'title' => 'Data Anggota',
        'active' => 'data-anggota'
    ]);
});

Route::get('/data-buku', function () {
    return view('data-buku.index', [
        'title' => 'Data Buku',
        'active' => 'data-buku'
    ]);
});

Route::get('/data-transaksi/data-peminjaman', function () {
    return view('data-transaksi.data-peminjaman.index', [
        'title' => 'Data Peminjaman',
        'active' => 'data-peminjaman'
    ]);
});

Route::get('/data-transaksi/data-pengembalian', function () {
    return view('data-transaksi.data-pengembalian.index', [
        'title' => 'Data Pengembalian',
        'active' => 'data-pengembalian'
    ]);
});

Route::get('/laporan', function () {
    return view('laporan.index', [
        'title' => 'Laporan',
        'active' => 'laporan'
    ]);
});

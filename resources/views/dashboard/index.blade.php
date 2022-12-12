@extends('dashboard.layouts.main')
@section('container')
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $books }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $members }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-reader fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sedang dipinjam
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $borrows->dipinjam }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-people-carry fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Buku dikembalikan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $borrows->selesai }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sistem Informasi Perpustakaan SD Negeri 017 Senayang</h6>
        </div>
        <div class="card-body">
            <p class="align-middle text-center h5">JANGAN LUPA UNTUK LOGOUT SETELAH DIGUNAKAN</p>
            <p class="mt-3">Aturan Peminjaman dan Pengembalian Buku :</p>
            <ul>
                <li>Setiap anggota yang ingin meminjam dan mengembalikan buku wajib membawa kartu anggota dan menunjukkannya
                    kepada pustakawan dan tidak boleh diwakilkan.</li>
                <li>Anggota hanya boleh meminjam buku sebanyak 1 eksemplar dengan jangka waktu paling lama satu minggu.</li>
                <li>Peminjaman hanya boleh dilakukan jika anggota tidak sedang meminjam buku.</li>
                <li>Apabila buku yang dipinjam dirusak ataupun hilang, maka pustakawan berhak meminta peminjam untuk
                    mengganti buku yang sama ataupun dengan uang seharga buku yang berlaku.</li>
                <li>Denda keterlambatan sebesar Rp.1000 per jumlah hari keterlambatan.</li>
                <li>Jangan lupa untuk melihat ketersediaan buku sebelum melakukan proses peminjaman.</li>
            </ul>
        </div>
    </div>
@endsection

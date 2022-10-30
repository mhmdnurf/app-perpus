@extends('layouts.main')
@section('container')
    <!-- Main Content -->

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container">
                <div class="fw-bold text-center" style="color: black">
                    <h3>SD NEGERI 017 SENAYANG</h3>
                    <hr style="border: 3px solid black">
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="color: rgb(100, 99, 99); border: 2px solid rgb(0, 0, 0);">
                    <tbody>
                        <tr>
                            <th colspan="2" class="text-center" style="border-bottom: none;">Perpustakaan SDN 017
                                Senayang
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" class="text-center">Detail Transaksi</th>
                        </tr>
                        <tr>
                            <th>Nomor Peminjaman</th>
                            <td>{{ $transaction->transaction_id }}</td>
                        </tr>
                        <tr>
                            <th>Data Anggota</th>
                            <td>{{ $transaction->member->no_anggota }}</td>
                        </tr>
                        <tr>
                            <th>Data Buku</th>
                            <td>{{ $transaction->book->judul }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Dikembalikan</th>
                            <td>{{ $transaction->tgl_kembalikan }}</td>
                        </tr>
                        <tr>
                            <th>Lama Peminjaman</th>
                            <td>{{ \Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) }}
                            </td>
                        </tr>
                        <tr>
                            <th>Denda</th>
                            <td>
                                @if (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) <= 7)
                                    Rp.0,-
                                @else
                                    {{ 'Rp.' . (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) - 7) * 1000 }},-
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <a href="/data-peminjaman/" class="btn btn-primary mt-2 float-right">Kembali</a>
        </div>
    </div>
@endsection

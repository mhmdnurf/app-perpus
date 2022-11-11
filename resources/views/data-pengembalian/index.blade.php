@extends('layouts.main')
@section('container')
    @if (count($transactions) === 0)
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{ $title }} Perpustakaan SD Negeri 017 Senayang</h6>
            </div>
            <div class="card-body">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>No. Transaksi</th>
                                <th>No. Anggota</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>ISBN</th>
                                <th>Status</th>
                                <th>Tanggal Dikembalikan</th>
                                <th>Keterangan</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr class="text-center">
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $transaction->no_transaksi }}</td>
                                    <td class="align-middle">{{ $transaction->member->no_anggota }}</td>
                                    <td class="align-middle">{{ $transaction->member->nama }}</td>
                                    <td class="align-middle">{{ $transaction->book->judul }}</td>
                                    <td class="align-middle">{{ $transaction->book->isbn }}</td>
                                    <td class="align-middle">
                                        @if ($transaction->tgl_kembalikan == null)
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#ModalEdit">
                                                Proses Pengembalian
                                            </button>
                                        @else
                                            <a href="/data-peminjaman/{{ $transaction->id }}"
                                                class="btn btn-success">Selesai</a>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::parse($transaction->tgl_kembalikan)->Format('d-m-Y') }}</td>
                                    <td class="align-middle text-center">
                                        @if ($transaction->status == 'Dipinjam')
                                            <p></p>
                                        @else
                                            {{ $transaction->keterangan }}
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        @if (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) <= 7 &&
                                            $transaction->status == 'Selesai')
                                            Rp.0,-
                                        @elseif (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) > 7 &&
                                            $transaction->status == 'Selesai')
                                            {{ 'Rp.' . (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) - 7) * 1000 }},-
                                        @else
                                            <p class="text-center"></p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
@else
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }} Perpustakaan SD Negeri 017 Senayang
            </h6>
        </div>
        <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>No. Transaksi</th>
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>Judul Buku</th>
                            <th>ISBN</th>
                            <th>Proses</th>
                            <th>Keterangan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="text-center">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $transaction->no_transaksi }}</td>
                                <td class="align-middle">{{ $transaction->member->no_anggota }}</td>
                                <td class="align-middle">{{ $transaction->member->nama }}</td>
                                <td class="align-middle">{{ $transaction->book->judul }}</td>
                                <td class="align-middle">{{ $transaction->book->isbn }}</td>
                                <td class="align-middle">
                                    @if ($transaction->tgl_kembalikan == null)
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#ModalEdit">
                                            Kembalikan
                                        </button>
                                    @else
                                        <a href="/data-peminjaman/{{ $transaction->id }}"
                                            class="btn btn-success">Selesai</a>
                                    @endif
                                </td>
                                <td class="align-middle text-center">
                                    @if ($transaction->status == 'Dipinjam')
                                        <p></p>
                                    @else
                                        {{ $transaction->keterangan }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) <= 7 &&
                                        $transaction->status == 'Selesai')
                                        Rp.0,-
                                    @elseif (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) > 7 &&
                                        $transaction->status == 'Selesai')
                                        {{ 'Rp.' . (\Carbon\Carbon::parse($transaction->tgl_pinjam)->diffInDays($transaction->tgl_kembalikan) - 7) * 1000 }},-
                                    @else
                                        <p class="text-center"></p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@include('data-peminjaman.partials.returnModal')
@endif

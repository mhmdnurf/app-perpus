@extends('layouts.main')
@section('container')
    @if (count($transactions) === 0)
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
                    <a href="/data-peminjaman/create" class="btn btn-primary mb-3">
                        <span class="text">Tambah Data Peminjaman</span>
                    </a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No.</th>
                                <th>No. Peminjaman</th>
                                <th>No. Anggota</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $transaction->transaction_id }}</td>
                                    <td>{{ $transaction->member->no_anggota }}</td>
                                    <td>{{ $transaction->member->nama }}</td>
                                    <td>{{ $transaction->book->judul }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tgl_pinjam)->Format('d-m-Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->tgl_kembali)->Format('d-m-Y') }}</td>
                                    <td>
                                        @if ($transaction->status == 'Dipinjam')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#ModalEdit">
                                                Kembalikan
                                            </button>
                                        @else
                                            <a href="/data-peminjaman/{{ $transaction->id }}" class="btn btn-success"
                                                class="btn btn-secondary">Selesai</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/data-peminjaman/{{ $transaction->id }}/edit" class="btn btn-primary mb-2"
                                            class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="/data-peminjaman/{{ $transaction->id }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger mb-2" class="btn btn-secondary"
                                                onclick="return confirm('Data akan hilang ketika dihapus, apakah anda yakin?')"><i
                                                    class="fas fa-user-times"></i></button>
                                        </form>
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
                <a href="/data-peminjaman/create" class="btn btn-primary mb-3">
                    <span class="text">Tambah Data Peminjaman</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>No. Peminjaman</th>
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Batas Pengembalian</th>
                            <th>Status</th>
                            <th>Hapus</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $transaction->no_transaksi }}</td>
                                <td class="align-middle">{{ $transaction->member->no_anggota }}</td>
                                <td class="align-middle">{{ $transaction->member->nama }}</td>
                                <td class="align-middle">{{ $transaction->book->judul }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($transaction->tgl_pinjam)->Format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($transaction->tgl_kembali)->Format('d-m-Y') }}</td>
                                <td class="text-center align-middle">
                                    @if ($transaction->status == 'Dipinjam')
                                        Sedang Dipinjam
                                    @else
                                        Telah Dikembalikan
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <form action="/data-peminjaman/{{ $transaction->id }}" method="POST"
                                        class="d-inline" class="text-center">
                                        @method('delete')
                                        @csrf
                                        <button class="text-danger border-0 bg-transparent"
                                            onclick="return confirm('Data akan hilang ketika dihapus, apakah anda yakin?')"><i
                                                class="fas fa-trash-alt fa-lg"></i></button>
                                    </form>
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

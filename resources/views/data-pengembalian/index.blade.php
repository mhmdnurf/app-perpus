@extends('layouts.main')
@section('container')
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
                            <th>No. Pinjaman</th>
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>Judul Buku</th>
                            <th>ISBN</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Keterangan</th>
                            <th>Denda</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($borrows as $borrow)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $borrow->borrow_id }}</td>
                                <td>{{ $borrow->member->no_anggota }}</td>
                                <td>{{ $borrow->member->nama }}</td>
                                <td>{{ $borrow->book->title }}</td>
                                <td>{{ $borrow->book->isbn }}</td>
                                <td>{{ \Carbon\Carbon::parse($borrow->tanggal_kembalikan)->Format('d-m-Y') }}</td>
                                <td>{{ $borrow->keterangan }}</td>
                                <td>
                                    @if (\Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays($borrow->tgl_kembalikan) <= 7)
                                        Rp.0,-
                                    @else
                                        {{ 'Rp.' . (\Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays($borrow->tgl_kembalikan) - 7) * 1000 }},-
                                    @endif
                                </td>
            </div>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

@extends('layouts.main')
@section('container')
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
                            <th>Jatuh Tempo</th>
                            <th>Status</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($borrows as $borrow)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $borrow->no_pinjam }}</td>
                                <td class="align-middle">{{ $borrow->member->no_anggota }}</td>
                                <td class="align-middle">{{ $borrow->member->nama }}</td>
                                <td class="align-middle">{{ $borrow->book->judul }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($borrow->tgl_pinjam)->Format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($borrow->tempo)->Format('d-m-Y') }}</td>
                                <td class="text-center align-middle">
                                    @if ($borrow->status != 'Dipinjam')
                                    <span class="border border-success rounded bg-success text-light p-1">
                                        Selesai
                                    </span>
                                    @elseif (\Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays(\Carbon\Carbon::today()) > 7)
                                        <span class="border border-primary rounded bg-primary text-light p-1">
                                            Dipinjam
                                    </span>
                                        <span class="text-danger">
                                        {{ 'Denda: Rp.' . (\Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays(\Carbon\Carbon::today()) - 7) * 1000 }},-
                                        </span>
                                    @else
                                    <span class="border border-primary rounded bg-primary text-light p-1">
                                        {{ $borrow->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="/data-peminjaman/{{ $borrow->id }}/edit" class="btn btn-default text-primary"><i
                                            class="fas fa-user-edit fa-lg"></i></a>
                                </td>
                                <td class="align-middle">
                                    <form action="/data-peminjaman/{{ $borrow->id }}" method="POST" class="d-inline"
                                        class="text-center">
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

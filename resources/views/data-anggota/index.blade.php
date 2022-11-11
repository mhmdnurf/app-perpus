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
                <a href="/data-anggota/create" class="btn btn-primary mb-3">
                    <span class="text">Tambah Data Anggota</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>No. Anggota</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Dibuat</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                            <th>Cetak</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($members as $member)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $member->no_anggota }}</td>
                                <td class="align-middle">{{ $member->nama }}</td>
                                <td class="align-middle">{{ $member->nis }}</td>
                                <td class="align-middle">{{ $member->tempat_lahir }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($member->tanggal_lahir)->Format('d-m-Y') }}</td>
                                @if ($member->jenis_kelamin == 'Laki-laki')
                                    <td class="align-middle">L</td>
                                @endif
                                @if ($member->jenis_kelamin == 'Perempuan')
                                    <td class="align-middle">P</td>
                                @endif
                                <td class="align-middle">{{ $member->alamat }}</td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($member->created_at)->Format('d-m-Y') }}
                                </td>
                                <td class="align-middle">
                                    <a href="/data-anggota/{{ $member->id }}/edit"
                                        class="btn btn-default text-primary"><i class="fas fa-user-edit fa-lg"></i></a>
                                </td>
                                <td class="align-middle">
                                    <form action="/data-anggota/{{ $member->id }}" method="POST" class="d-inline"
                                        class="text-center">
                                        @method('delete')
                                        @csrf
                                        <button class="text-danger border-0 bg-transparent"
                                            onclick="return confirm('Data akan hilang ketika dihapus, apakah anda yakin?')"><i
                                                class="fas fa-trash-alt fa-lg"></i></button>
                                    </form>
                                </td>
                                <td class="align-middle">
                                    <a href="/data-anggota/{{ $member->id }}" class="btn btn-default text-success"
                                        target="_blank"><i class="fas fa-file-export fa-lg"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

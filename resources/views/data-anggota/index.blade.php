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
                <a href="/data-anggota/create" class="btn btn-primary mb-3">
                    <span class="text">Tambah Data Anggota</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th class="col-4">Nama</th>
                            <th>NIS</th>
                            <th class="col-3">Tempat Lahir</th>
                            <th class="col-6">Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th class="col-6">Action</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->nama }}</td>
                                <td>{{ $member->nis }}</td>
                                <td>{{ $member->tempat_lahir }}</td>
                                {{-- <td>{{ $member->tanggal_lahir }}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($member->tanggal_lahir)->isoFormat('D MMMM Y') }}</td>
                                <td>{{ $member->jenis_kelamin }}</td>
                                <td>{{ $member->kelas }}</td>
                                <td>{{ $member->alamat }}</td>
                                <td><a href="/data-anggota/{{ $member->id }}/edit" class="btn btn-primary mb-2"
                                        class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
                                    <form action="/data-anggota/{{ $member->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger mb-2" class="btn btn-secondary"
                                            onclick="return confirm('Data akan hilang ketika dihapus, apakah anda yakin?')"><i
                                                class="fas fa-user-times"></i></button>
                                    </form>
                                    <a href="/data-anggota/{{ $member->id }}" class="btn btn-success"
                                        class="btn btn-secondary" target="_blank"><i class="fas fa-file-export"></i></a>
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

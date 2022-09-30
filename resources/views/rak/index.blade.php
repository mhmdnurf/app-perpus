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
                <a href="/rak/create" class="btn btn-primary mb-3">
                    <span class="text">Tambah Rak</span>
                </a>
                <table class="table table-bordered ml-auto mr-auto" id="dataTable" width="70%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th width='15px'>No.</th>
                            <th>Nama Rak</th>
                            <th>Keterangan</th>
                            <th width='120px'>Aksi</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($racks as $rack)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rack->name }}</td>
                                <td>{{ $rack->keterangan }}</td>
                                <td><a href="/rak/{{ $rack->id }}/edit" class="btn btn-primary mb-2"
                                        class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                    <form action="/rak/{{ $rack->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger mb-2" class="btn btn-secondary"
                                            onclick="return confirm('Data akan hilang ketika dihapus, apakah anda yakin?')"><i
                                                class="fas fa-trash-alt"></i></button>
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

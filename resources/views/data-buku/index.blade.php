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
                    <span class="text">Tambah Data Buku</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>Rak</th>
                            <th>Kategori</th>
                            <th>Penerbit</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->rack->name }}</td>
                                <td>{{ $book->category->name }}</td>
                                <td>{{ $book->penerbit }}</td>
                                <td>{{ $book->pengarang }}</td>
                                <td>{{ $book->tahun }}</td>
                                <td>{{ $book->stok }}</td>
                                <td><a href="/data-buku/{{ $book->id }}/edit" class="btn btn-primary mb-2"
                                        class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
                                    <form action="/data-buku/{{ $book->id }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger mb-2" class="btn btn-secondary"
                                            onclick="return confirm('Data akan hilang ketika dihapus, apakah anda yakin?')"><i
                                                class="fas fa-user-times"></i></button>
                                    </form>
                                    <a href="/data-buku/{{ $book->id }}" class="btn btn-success"
                                        class="btn btn-secondary" target="_blank"><i class="fas fa-file-export"></i></a>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

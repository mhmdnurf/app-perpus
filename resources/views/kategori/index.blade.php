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
                <a href="/kategori/create" class="btn btn-primary mb-3">
                    <span class="text">Tambah Kategori</span>
                </a>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kategori</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/kategori" method="POST">
                                    @csrf
                                    <label for="name">Nama Kategori</label>
                                    <input id="name" type="text" name="name" required autofocus
                                        class="form-control @error('name')
                                        is-invalid
                                    @enderror">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered ml-auto mr-auto" id="dataTable" width="70%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th width='15px'>No.</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th width='120px'>Aksi</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->keterangan }}</td>
                                <td><a href="/kategori/{{ $category->id }}/edit" class="btn btn-primary mb-2"
                                        class="btn btn-secondary"><i class="fas fa-edit"></i></a>
                                    <form action="/kategori/{{ $category->id }}" method="POST" class="d-inline">
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

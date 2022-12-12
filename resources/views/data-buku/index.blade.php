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
                <a href="/data-buku/create" class="btn btn-primary mb-3">
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
                            <th>Jumlah</th>
                            <th>Stok</th>
                            <th>Ubah</th>
                            <th>Hapus</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($books as $book)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $book->judul }}</td>
                                <td class="align-middle">{{ $book->isbn }}</td>
                                <td class="align-middle">{{ $book->rack->nama }}</td>
                                <td class="align-middle">{{ $book->category->nama }}</td>
                                <td class="align-middle">{{ $book->penerbit }}</td>
                                <td class="align-middle">{{ $book->pengarang }}</td>
                                <td class="align-middle">{{ $book->tahun }}</td>
                                <td class="align-middle">{{ $book->jumlah }}</td>
                                <td class="align-middle">
                                    @if ($book->stok == 0)
                                        <span class="border border-danger rounded bg-danger text-light p-1">
                                            Habis
                                        @else
                                            {{ $book->stok }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="/data-buku/{{ $book->id }}/edit" class="btn btn-default text-primary"><i
                                            class="fas fa-user-edit fa-lg"></i></a>
                                </td>
                                <td class="align-middle text-center">
                                    <form action="/data-buku/{{ $book->id }}" method="POST" class="d-inline"
                                        class="text-center">
                                        @method('delete')
                                        @csrf
                                        <button class="text-danger border-0 bg-transparent delete-buku"><i
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

@section('script')
    <script>
        $('.delete-buku').click(function() {
            var form = $(this).closest('form');
            var id = $(this).data('id');
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin untuk menghapus data?',
                text: "Data akan hilang saat dihapus dan tidak dapat dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

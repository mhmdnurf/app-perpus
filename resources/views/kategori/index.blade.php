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

                <table class="table table-bordered ml-auto mr-auto" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th width='10px'>No.</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th width='10px'>Edit</th>
                            <th width='10px'>Hapus</th>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $category->nama }}</td>
                                <td class="align-middle">{{ $category->keterangan }}</td>
                                <td class="align-middle"><a href="/kategori/{{ $category->id }}/edit"
                                        class="btn btn-default text-primary"><i class="fas fa-user-edit fa-lg"></i></a>
                                </td>
                                <td class="align-middle">
                                    <form action="/kategori/{{ $category->id }}" method="POST" class="d-inline"
                                        class="text-center">
                                        @method('delete')
                                        @csrf
                                        <button class="text-danger border-0 bg-transparent delete-kategori"><i
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
        $('.delete-kategori').click(function() {
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

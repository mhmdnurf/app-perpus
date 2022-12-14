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
                <a href="/data-pengembalian/create" class="btn btn-primary mb-3">
                    <span class="text">Proses Pengembalian</span>
                </a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>No.</th>
                            <th>No. Peminjaman</th>
                            <th>Nama</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Jatuh Tempo</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Terlambat</th>
                            <th>Denda</th>
                            <th>Keterangan</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returneds as $returned)
                            <tr class="text-center">
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $returned->borrow->no_pinjam }}</td>
                                <td class="align-middle">{{ $returned->borrow->member->nama }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($returned->borrow->tgl_pinjam)->Format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($returned->borrow->tempo)->Format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($returned->tgl_kembalikan)->Format('d-m-Y') }}</td>
                                <td class="align-middle">
                                    @if ($returned->terlambat == 0)
                                        -
                                    @else
                                        {{ $returned->terlambat }} Hari
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($returned->denda == 0)
                                        -
                                    @else
                                        Rp.{{ $returned->denda }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    @if ($returned->keterangan == null)
                                        -
                                    @else
                                        {{ $returned->keterangan }}
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <form action="/data-pengembalian/{{ $returned->id }}" method="POST" class="d-inline"
                                        class="text-center">
                                        @method('delete')
                                        @csrf
                                        <button class="text-danger border-0 bg-transparent delete-kembali"><i
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
        $('.delete-kembali').click(function() {
            var form = $(this).closest('form');
            var id = $(this).data('id');
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin untuk menghapus data?',
                text: "Data akan hilang saat dihapus dan tidak dapat dikembalikan serta data pada peminjaman juga akan hilang",
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

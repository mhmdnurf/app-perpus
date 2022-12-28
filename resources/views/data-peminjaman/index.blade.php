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
                                        <span class="border border-danger rounded bg-danger text-light p-1">
                                            Terlambat
                                        @else
                                            <span class="border border-primary rounded bg-primary text-light p-1">
                                                {{ $borrow->status }}
                                            </span>
                                    @endif
                                </td>
                                @if ($borrow->status == 'Dipinjam')
                                    <td class="align-middle">
                                        <form action="/data-peminjaman/{{ $borrow->id }}" method="POST" class="d-inline"
                                            class="text-center">
                                            @method('delete')
                                            @csrf
                                            <button class="text-danger border-0 bg-transparent delete-pinjam"><i
                                                    class="fas fa-trash-alt fa-lg"></i></button>
                                        </form>
                                    </td>
                                @else
                                    <td class="align-middle"><button
                                            class="text-danger border-0 bg-transparent alert-pinjam"><i
                                                class="fas fa-trash-alt fa-lg"></i></button></td>
                                    @continue($borrow->status == 'Selesai')
                                @endif
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
        $('.delete-pinjam').click(function() {
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

        $('.alert-pinjam').click(function() {
            var form = $(this).closest('form');
            event.preventDefault();
            Swal.fire({
                title: 'Hapus tidak dapat dilakukan!',
                text: 'Data peminjaman telah selesai, silahkan hapus pada data pengembalian',
                icon: 'error',
            })
        });
    </script>
@endsection

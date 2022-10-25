{{-- Modal Form for Show Return Book Details --}}
@foreach ($borrows as $borrow)
    <div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalDetail">Detail Pengembalian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="get">
                        <table class="table table-bordered" id="ModalDetail" width="100%" cellspacing="0"
                            style="color: black; border: 1px solid black;">
                            <tbody>
                                <tr>
                                    <th colspan="2" class="text-center" style="border-bottom: none;">Perpustakaan
                                        SDN
                                        017
                                        Senayang</th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="text-center">Detail Transaksi</th>
                                </tr>
                                <tr>
                                    <th>Nomor Peminjaman</th>
                                    <td>{{ $borrow->borrow_id }}</td>
                                </tr>
                                <tr>
                                    <th>Data Anggota</th>
                                    <td>{{ $borrow->member->no_anggota }} [{{ $borrow->member->nama }}]</td>
                                </tr>
                                <tr>
                                    <th>Data Buku</th>
                                    <td>{{ $borrow->book->title }} [{{ $borrow->book->isbn }}]</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Dikembalikan</th>
                                    <td>{{ $borrow->tgl_kembalikan }}</td>
                                </tr>
                                <tr>
                                    <th>Lama Peminjaman</th>
                                    <td>{{ \Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays($borrow->tgl_kembalikan) }}
                                        Hari
                                    </td>
                                </tr>
                                <tr>
                                    <th>Denda</th>
                                    <td>
                                        @if (\Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays($borrow->tgl_kembalikan) <= 7)
                                            Rp.0,-
                                        @else
                                            {{ 'Rp.' . (\Carbon\Carbon::parse($borrow->tgl_pinjam)->diffInDays($borrow->tgl_kembalikan) - 7) * 1000 }},-
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

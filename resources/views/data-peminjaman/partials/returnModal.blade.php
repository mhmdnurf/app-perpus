<!-- Modal Kembalikan -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalEdit">Proses Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/data-peminjaman/{{ $transaction->id }}" method="POST">
                    @method('put')
                    @csrf
                    <label for="no_transaksi">Nomor Peminjaman</label>
                    <input id="no_transaksi" type="text" name="no_transaksi" required readonly class="form-control"
                        value="{{ $transaction->no_transaksi }}">

                    <label for="member_id" hidden>ID Anggota</label>
                    <input type="hidden" name="member_id" required readonly class="form-control"
                        value="{{ $transaction->member_id }}">

                    <label for="no_anggota">Nomor Anggota</label>
                    <input id="no_anggota" type="text" name="no_anggota" required readonly class="form-control"
                        value="{{ $transaction->member->no_anggota }}">

                    <label for="nama">Nama Anggota</label>
                    <input id="nama" type="text" name="nama" required readonly class="form-control"
                        value="{{ $transaction->member->nama }}">

                    <label for="book_id" hidden>ID Buku</label>
                    <input type="hidden" name="book_id" required readonly class="form-control"
                        value="{{ $transaction->book_id }}">

                    <label for="judul">Judul Buku</label>
                    <input id="judul" type="text" name="judul" required readonly class="form-control"
                        value="{{ $transaction->book->judul }}">

                    <label for="isbn">ISBN</label>
                    <input id="isbn" type="text" name="isbn" required readonly class="form-control"
                        value="{{ $transaction->book->isbn }}">

                    <label for="tgl_pinjam">Tanggal Peminjaman</label>
                    <input id="tgl_pinjam" type="text" name="tgl_pinjam" required readonly class="form-control"
                        value="{{ $transaction->tgl_pinjam }}">

                    <label for="tgl_kembali">Batas Pengembalian</label>
                    <input id="tgl_kembali" type="text" name="tgl_kembali" required readonly class="form-control"
                        value="{{ $transaction->tgl_kembali }}">

                    <label for="tgl_kembalikan">Tanggal Dikembalikan</label>
                    <input id="tgl_kembalikan" type="date" name="tgl_kembalikan" required class="form-control">

                    <label for="keterlambatan" hidden>Keterlambatan</label>
                    <input id="keterlambatan" type="hidden" name="keterlambatan" required class="form-control"
                        value="{{ \Carbon\Carbon::parse($transaction->tgl_kembalikan)->diffInDays($transaction->updated_at) }}">

                    <label for="status">Status</label>
                    <input id="status" type="text" name="status" required readonly class="form-control"
                        value="Selesai">

                    <label for="keterangan">Keterangan</label>
                    <select class="form-control" name="keterangan" id="keterangan">
                        <option value="Baik dan tepat waktu" selected>Baik dan tepat waktu
                        </option>
                        <option value="Dikembalikan dengan baik namun terlambat">Dikembalikan dengan baik,
                            tidak
                            tepat
                            waktu</option>
                        <option value="Buku hilang">Buku hilang</option>
                        <option value="Buku rusak">Buku rusak</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mb-2 mt-2"
                    onclick="return confirm('Apakah anda yakin?')">Proses
                    Pengembalian</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>

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
                <form action="/data-peminjaman/{{ $borrow->id }}" method="POST">
                    @method('patch')
                    @csrf
                    <label for="borrow_id">Nomor Peminjaman</label>
                    <input id="borrow_id" type="text" name="borrow_id" required readonly class="form-control"
                        value="{{ $borrow->borrow_id }}">

                    <label for="member_id" hidden>ID Anggota</label>
                    <input type="hidden" name="member_id" required readonly class="form-control"
                        value="{{ $borrow->member_id }}">

                    <label for="no_anggota">Nomor Anggota</label>
                    <input id="no_anggota" type="text" name="no_anggota" required readonly class="form-control"
                        value="{{ $borrow->member->no_anggota }}">

                    <label for="nama">Nama Anggota</label>
                    <input id="nama" type="text" name="nama" required readonly class="form-control"
                        value="{{ $borrow->member->nama }}">

                    <label for="book_id" hidden>ID Buku</label>
                    <input type="hidden" name="book_id" required readonly class="form-control"
                        value="{{ $borrow->book_id }}">

                    <label for="title">Judul Buku</label>
                    <input id="title" type="text" name="title" required readonly class="form-control"
                        value="{{ $borrow->book->title }}">

                    <label for="isbn">ISBN</label>
                    <input id="isbn" type="text" name="isbn" required readonly class="form-control"
                        value="{{ $borrow->book->isbn }}">

                    <label for="tgl_pinjam">Tanggal Peminjaman</label>
                    <input id="tgl_pinjam" type="text" name="tgl_pinjam" required readonly class="form-control"
                        value="{{ $borrow->tgl_pinjam }}">

                    <label for="tgl_kembali">Tanggal Pengembalian</label>
                    <input id="tgl_kembali" type="text" name="tgl_kembali" required readonly class="form-control"
                        value="{{ $borrow->tgl_kembali }}">

                    <label for="tgl_kembalikan">Tanggal Dikembalikan</label>
                    <input id="tgl_kembalikan" type="date" name="tgl_kembalikan" required class="form-control">

                    <label for="keterlambatan" hidden>Keterlambatan</label>
                    <input id="keterlambatan" type="hidden" name="keterlambatan" required class="form-control"
                        value="{{ \Carbon\Carbon::parse($borrow->tgl_kembalikan)->diffInDays($borrow->updated_at) }}">

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

@extends('layouts.main')
@section('container')
    <form action="/data-pengembalian" method="POST">
        @csrf

        <label for="borrow">Nomor Peminjaman</label>
        <select class="form-control" aria-label="Default select example" name="borrow_id" id="borrow_id">
            @foreach ($borrows as $borrow)
                @if ($borrow->status == 'Dipinjam')
                    <option></option>
                    <option value="{{ $borrow->id }}">{{ $borrow->no_pinjam }}</option>
                @else
                    <option></option>
                @endif
            @endforeach
        </select>
        @error('borrow')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tgl_kembalikan">Tanggal Pengembalian</label>
        <input id="tgl_kembalikan" type="date" name="tgl_kembalikan"
            class="form-control @error('tgl_kembalikan')
        is-invalid
    @enderror">
        @error('tgl_kembalikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tgl_pinjam">Tanggal Peminjaman</label>
        <input id="tgl_pinjam" type="date" name="tgl_pinjam" readonly
            class="form-control @error('tgl_pinjam')
        is-invalid
    @enderror">
        @error('tgl_pinjam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="judul">Judul Buku</label>
        <input id="judul" type="text" name="judul" readonly
            class="form-control @error('judul')
        is-invalid
    @enderror">
        @error('judul')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="isbn">ISBN</label>
        <input id="isbn" type="text" name="isbn" readonly
            class="form-control @error('isbn')
        is-invalid
    @enderror">
        @error('isbn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="nama">Nama Anggota</label>
        <input id="nama" type="text" name="nama" readonly
            class="form-control @error('nama')
        is-invalid
    @enderror">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="nomor">Nomor Anggota</label>
        <input id="nomor" type="text" name="nomor" readonly
            class="form-control @error('nomor')
        is-invalid
    @enderror">
        @error('nomor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" placeholder="(Opsional, boleh dikosongkan)" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror"></textarea>
        </div>

        <div class="form-group">
            <input class="book_id" type="hidden" name="book_id">
        </div>

        <a href="/data-pengembalian" class="btn btn-danger float-right mt-2">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2 mt-2">Submit</button>
    </form>
@endsection

@section('script')
    <script>
        const datas = {{ Js::from($borrows) }};

        document.getElementById("borrow_id").onchange = function() {
            const id = document.getElementById("borrow_id").value;
            const data = datas.find(data => data.id == id);
            judul.value = data.book.judul;
            isbn.value = data.book.isbn;
            nama.value = data.member.nama;
            nomor.value = data.member.no_anggota;
            tgl_pinjam.value = data.tgl_pinjam;
            document.getElementsByClassName('book_id')[0].value = data.book.id;
        }
    </script>
@endsection

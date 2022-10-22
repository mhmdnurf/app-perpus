@extends('layouts.main')
@section('container')
    <form action="/data-peminjaman" method="POST">
        @csrf
        <label for="member">Nomor Anggota</label>
        <input type="text" id="member_search" class="form-control">

        <label for="member_id">Nama Anggota</label>
        <input id="member_id" type="text" name="member_id" readonly
            class="form-control @error('member_id')
        is-invalid
    @enderror">
        @error('member_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="book">Judul Buku</label>
        <input type="text" id="book_search" class="form-control">

        <label for="book_id">ISBN</label>
        <input id="book_id" type="text" name="book_id" readonly
            class="form-control @error('book_id')
        is-invalid
    @enderror">
        @error('book_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tgl_pinjam">Tanggal Peminjaman</label>
        <input id="tgl_pinjam" type="date" name="tgl_pinjam"
            class="form-control @error('tgl_pinjam')
        is-invalid
    @enderror">
        @error('tgl_pinjam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tgl_kembali">Tanggal Pengembalian</label>
        <input id="tgl_kembali" type="date" name="tgl_kembali"
            class="form-control @error('tgl_kembali')
        is-invalid
    @enderror">
        @error('tgl_kembali')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/data-peminjaman" class="btn btn-danger">Cancel</a>
    </form>
@endsection

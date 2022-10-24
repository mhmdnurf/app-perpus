@extends('layouts.main')
@section('container')
    <form action="/data-peminjaman" method="POST">
        @csrf
        <label for="member">Data Anggota</label>
        <select class="form-control" aria-label="Default select example" name="member_id" id="member_id">
            @foreach ($members as $member)
                <option></option>
                <option value="{{ $member->id }}">{{ $member->no_anggota }} | {{ $member->nama }}</option>
            @endforeach
        </select>
        @error('member')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="book">Data Buku</label>
        <select class="form-control" aria-label="Default select example" name="book_id" id="book_id">
            @foreach ($books as $book)
                <option></option>
                <option value="{{ $book->id }}">{{ $book->title }} | {{ $book->isbn }}</option>
            @endforeach
        </select>
        @error('book')
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

        <label for="status" hidden>Status</label>
        <input id="status" type="hidden" name="status" value="Dipinjam"
            class="form-control @error('status')
        is-invalid
    @enderror">
        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="keterangan" hidden>Status</label>
        <input id="keterangan" type="hidden" name="keterangan" value=""
            class="form-control @error('keterangan')
        is-invalid
    @enderror">
        @error('keterangan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/data-peminjaman" class="btn btn-danger">Cancel</a>
    </form>
@endsection

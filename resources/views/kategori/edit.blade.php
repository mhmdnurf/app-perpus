@extends('layouts.main')
@section('container')
    <form action="/kategori/{{ $category->id }}" method="POST">
        @method('put')
        @csrf
        <label for="nama">Nama Kategori</label>
        <input id="nama" type="text" name="nama" required autofocus
            class="form-control @error('nama')
            is-invalid
        @enderror"
            value="{{ old('nama', $category->nama) }}">

        <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror"> {{ old('keterangan', $category->keterangan) }}</textarea>
        </div>

        <a href="/kategori" class="btn btn-danger float-right">Batal</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Ubah</button>
    </form>
@endsection

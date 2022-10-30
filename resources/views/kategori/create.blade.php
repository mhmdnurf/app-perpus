@extends('layouts.main')
@section('container')
    <form action="/kategori" method="POST">
        @csrf
        <label for="nama">Nama Kategori</label>
        <input id="nama" type="text" name="nama" required autofocus
            class="form-control @error('nama')
            is-invalid
        @enderror">

        <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror"></textarea>
        </div>

        <a href="/kategori" class="btn btn-danger float-right">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
    </form>
@endsection

@extends('layouts.main')
@section('container')
    <form action="/rak/{{ $rack->id }}" method="POST">
        @method('put')
        @csrf
        <label for="name">Nama Rak Buku</label>
        <input id="name" type="text" name="name" required autofocus
            class="form-control @error('name')
            is-invalid
        @enderror"
            value="{{ old('name', $rack->name) }}">

        <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror"> {{ old('keterangan', $rack->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/rak" class="btn btn-danger">Cancel</a>
    </form>
@endsection

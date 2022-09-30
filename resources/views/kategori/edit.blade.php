@extends('layouts.main')
@section('container')
    <form action="/kategori/{{ $category->id }}" method="POST">
        @method('put')
        @csrf
        <label for="name">Nama Kategori</label>
        <input id="name" type="text" name="name" required autofocus
            class="form-control @error('name')
            is-invalid
        @enderror"
            value="{{ old('name', $category->name) }}">

        <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror"> {{ old('keterangan', $category->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/kategori" class="btn btn-danger">Cancel</a>
    </form>
@endsection

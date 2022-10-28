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

        <a href="/kategori" class="btn btn-danger float-right">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Update</button>
    </form>
@endsection

@extends('layouts.main')
@section('container')
    <form action="/rak" method="POST">
        @csrf
        <label for="name">Nama Rak</label>
        <input id="name" type="text" name="name" required autofocus
            class="form-control @error('name')
            is-invalid
        @enderror">

        <div class="form-group mt-2">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror"></textarea>
        </div>

        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/rak" class="btn btn-danger">Cancel</a>
    </form>
@endsection

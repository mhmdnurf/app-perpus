@extends('layouts.main')
@section('container')
    <form action="/data-buku" method="POST">
        @csrf
        <label for="title">Judul Buku</label>
        <input id="title" type="text" name="title" required autofocus
            class="form-control @error('title')
        is-invalid
    @enderror">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="isbn">ISBN</label>
        <input id="isbn" type="text" name="isbn" required autofocus
            class="form-control @error('isbn')
        is-invalid
    @enderror">
        @error('isbn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="category" class="mt-2">Kategori</label>
        <select class="form-control" name="category_id">
            @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach

        </select>

        <label for="rack" class="mt-2">Rak</label>
        <select class="form-control" aria-label="Default select example" name="rack_id">
            @foreach ($racks as $rack)
                @if (old('rack_id') == $rack->id)
                    <option value="{{ $rack->id }}" selected>{{ $rack->name }}</option>
                @else
                    <option value="{{ $rack->id }}">{{ $rack->name }}</option>
                @endif
            @endforeach

        </select>
        @error('rack')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="penerbit" class="mt-2">Penerbit</label>
        <input type="text" id="penerbit" name="penerbit" required
            class="form-control @error('penerbit')
        is-invalid
    @enderror">
        @error('penerbit')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="pengarang" class="mt-2">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" required
            class="form-control @error('pengarang')
        is-invalid
    @enderror">

        @error('pengarang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tahun" class="mt-2">Tahun</label>
        <input type="text" id="tahun" name="tahun" required
            class="form-control @error('tahun')
        is-invalid
    @enderror">

        @error('tahun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="jumlah" class="mt-2">Jumlah</label>
        <input type="text" id="jumlah" name="jumlah" required
            class="form-control @error('jumlah')
        is-invalid
    @enderror">

        @error('jumlah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="btn btn-primary mb-2 mt-2">Submit</button>
        <a href="/data-buku" class="btn btn-danger">Cancel</a>
    </form>
@endsection

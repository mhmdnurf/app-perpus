@extends('layouts.main')
@section('container')
    <form action="/data-buku/{{ $book->id }}" method="POST">
        @method('put')
        @csrf
        <label for="judul">Judul Buku</label>
        <input id="judul" type="text" name="judul" required autofocus
            class="form-control @error('judul')
        is-invalid
    @enderror" value="{{ old('judul', $book->judul) }}">
        @error('judul')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="isbn">ISBN</label>
        <input id="isbn" type="text" name="isbn" required autofocus
            class="form-control @error('isbn')
        is-invalid
    @enderror" value="{{ old('isbn', $book->isbn) }}">
        @error('isbn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="category" class="mt-2">Kategori</label>
        <select class="form-control" name="category_id">
            @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->nama }}</option>
                @endif
            @endforeach

        </select>

        <label for="rack" class="mt-2">Rak</label>
        <select class="form-control" aria-label="Default select example" name="rack_id">
            @foreach ($racks as $rack)
                @if (old('rack_id') == $rack->id)
                    <option value="{{ $rack->id }}" selected>{{ $rack->nama }}</option>
                @else
                    <option value="{{ $rack->id }}">{{ $rack->nama }}</option>
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
    @enderror"
            value="{{ old('penerbit', $book->penerbit) }}">
        @error('penerbit')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="pengarang" class="mt-2">Pengarang</label>
        <input type="text" id="pengarang" name="pengarang" required
            class="form-control @error('pengarang')
        is-invalid
    @enderror"
            value="{{ old('pengarang', $book->pengarang) }}">

        @error('pengarang')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tahun" class="mt-2">Tahun</label>
        <input type="text" id="tahun" name="tahun" required
            class="form-control @error('tahun')
        is-invalid
    @enderror" value="{{ old('tahun', $book->tahun) }}">

        @error('tahun')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="stok" class="mt-2">Stok</label>
        <input type="text" id="stok" name="stok" required
            class="form-control @error('stok')
        is-invalid
    @enderror" value="{{ old('stok', $book->jumlah) }}">

        @error('stok')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <a href="/data-buku" class="btn btn-danger float-right">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Update</button>
    </form>
@endsection

@extends('layouts.main')
@section('container')
    <form action="/data-buku" method="POST">
        @csrf
        <label for="judul">Judul Buku</label>
        <input id="judul" type="text" name="judul" required autofocus
            class="form-control @error('judul')
        is-invalid
    @enderror">
        @error('judul')
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

        <a href="/data-buku" class="btn btn-danger float-right mb-2 mt-2">Batal</a>
        <button type="submit" class="btn btn-primary mb-2 mt-2 float-right mr-2 tambah-buku">Tambah</button>
    </form>
@endsection

@section('script')
    <script>
        $('.tambah-buku').click(function() {
            var form = $(this).closest('form');
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin data yang di-input sudah benar?',
                text: "Pastikan Nomor ISBN sudah benar karena tidak dapat diubah!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Proses'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

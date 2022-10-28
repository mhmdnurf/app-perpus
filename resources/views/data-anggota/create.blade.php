@extends('layouts.main')
@section('container')
    <form action="/data-anggota" method="POST">
        @csrf
        <label for="nama">Nama Lengkap</label>
        <input id="nama" type="text" name="nama" required autofocus
            class="form-control @error('nama')
            is-invalid
        @enderror">

        <label for="nis" class="mt-2">NIS</label>
        <input id="nis" type="text" name="nis" required
            class="form-control @error('nis')
            is-invalid
        @enderror">
        @error('nis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tempat_lahir" class="mt-2">Tempat Lahir</label>
        <input id="tempat_lahir" type="text" name="tempat_lahir" required
            class="form-control @error('tempat_lahir')
            is-invalid
        @enderror">

        <label for="tanggal_lahir" class="mt-2">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required class="form-control">

        <label for="jenis_kelamin" class="mt-2">Jenis Kelamin</label>
        <div class="form-check">
            <input type="radio" name="jenis_kelamin" value="Laki-laki" checked
                class="form-check-input @error('jenis_kelamin')
                is-invalid
            @enderror">
            <label class="form-check-label" for="jenis_kelamin">
                Laki - laki
            </label>
            <input type="radio" name="jenis_kelamin" value="Perempuan">
            <label class="form-check-label" for="jenis_kelamin"
                class="form-check-input @error('jenis_kelamin')
                is-invalid
            @enderror">
                Perempuan
            </label>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea id="alamat" name="alamat" rows="2"
                class="form-control @error('alamat')
                is-invalid
            @enderror" required></textarea>
        </div>

        <a href="/data-anggota" class="btn btn-danger float-right">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
    </form>
@endsection

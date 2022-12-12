@extends('layouts.main')
@section('container')
    <form action="/data-anggota/{{ $member->id }}" method="POST">
        @method('put')
        @csrf
        <label for="nama">Nama Lengkap</label>
        <input id="nama" type="text" name="nama" required
            class="form-control @error('nama')
            is-invalid
        @enderror"
            value="{{ old('nama', $member->nama) }}">
        @error('nama')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="nis" class="mt-2">NIS</label>
        <input id="nis" type="text" name="nis" readonly
            class="form-control @error('nis')
            is-invalid
        @enderror"
            value="{{ old('nis', $member->nis) }}">
        @error('nis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tempat_lahir" class="mt-2">Tempat Lahir</label>
        <input id="tempat_lahir" type="text" name="tempat_lahir" required
            class="form-control @error('tempat_lahir')
            is-invalid
        @enderror"
            value="{{ old('tempat_lahir', $member->tempat_lahir) }}">
        @error('tempat_lahir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <label for="tanggal_lahir" class="mt-2">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
            class="form-control @error('tanggal_lahir')
            is-invalid
        @enderror"
            value="{{ old('tanggal_lahir', $member->tanggal_lahir) }}">
        @error('tanggal_lahir')
            {{ $message }}
        @enderror
        <label for="jenis_kelamin" class="mt-2">Jenis Kelamin</label>
        <div class="form-check">
            <input value="Laki-laki" type="radio" name="jenis_kelamin"
                class="form-check-input @error('jenis_kelamin')
                is-invalid
            @enderror"
                {{ $member->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
            <label class="form-check-label" for="jenis_kelamin">
                Laki - laki
            </label>
            <input type="radio" value="Perempuan" name="jenis_kelamin"
                {{ $member->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
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
            @enderror" required>{{ $member->alamat }}</textarea>
        </div>

        <a href="/data-anggota" class="btn btn-danger float-right">Batal</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Ubah</button>
    </form>
@endsection

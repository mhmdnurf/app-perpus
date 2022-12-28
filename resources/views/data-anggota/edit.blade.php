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
            <label for="kelas" class="mt-2">Kelas</label>
        <select class="form-control" name="kelas">
            <option value="{{ $member->kelas }}" disabled selected>{{ $member->kelas }}</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        </div>

        <a href="/data-anggota" class="btn btn-danger float-right">Batal</a>
        <button type="submit" class="btn btn-primary float-right mr-2">Ubah</button>
    </form>
@endsection

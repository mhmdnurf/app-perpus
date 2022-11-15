@extends('layouts.main')
@section('container')
    <form action="/data-peminjaman/{{ $borrow->id }}" method="POST">
        @method('put')
        @csrf
        <label for="tgl_pinjam">Tanggal Peminjaman</label>
        <input id="tgl_pinjam" type="date" name="tgl_pinjam" required
            class="form-control @error('tgl_pinjam')
            is-invalid
        @enderror"
            value="{{ old('tgl_pinjam', $borrow->tgl_pinjam) }}">
        @error('tgl_pinjam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tempo" class="mt-2">Tempo</label>
        <input id="tempo" type="date" name="tempo" required
            class="form-control @error('tempo')
            is-invalid
        @enderror"
            value="{{ old('tempo', $borrow->tempo) }}">
        @error('tempo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="status" class="mt-2">Status</label>
        <select class="form-control" name="status">
            <option></option>
            <option value="Dipinjam">Dipinjam</option>
            <option value="Selesai">Selesai</option>
        </select>

        <a href="/data-peminjaman" class="btn btn-danger float-right mt-2">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2 mt-2">Update</button>
    </form>
@endsection

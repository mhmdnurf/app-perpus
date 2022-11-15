@extends('layouts.main')
@section('container')
    <form action="/data-pengembalian" method="POST">
        @csrf

        <label for="tgl_kembalikan">Tanggal Pengembalian</label>
        <input id="tgl_kembalikan" type="date" name="tgl_kembalikan" 
            class="form-control @error('tgl_kembalikan')
        is-invalid
    @enderror">
        @error('tgl_kembalikan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        
        <label for="borrow">Nomor Peminjaman</label>
        <select class="form-control" aria-label="Default select example" name="borrow_id" id="borrow_id">
            @foreach ($borrows as $borrow)
                @if ($borrow->status == 'Dipinjam')
                    <option></option>
                    <option value="{{ $borrow->id }}">{{ $borrow->no_pinjam }}</option>
                @else
                    <option></option>
                @endif
            @endforeach
        </select>
        @error('borrow')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        
        <label for="denda">Denda</label>
        <input id="denda" type="text" name="denda"
            class="form-control @error('denda')
        is-invalid
    @enderror">
        @error('denda')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="2"
                class="form-control @error('keterangan')
                is-invalid
            @enderror" required></textarea>
        </div>

        <a href="/data-peminjaman" class="btn btn-danger float-right mt-2">Cancel</a>
        <button type="submit" class="btn btn-primary float-right mr-2 mt-2">Submit</button>
    </form>
@endsection

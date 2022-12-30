@extends('layouts.main')
@section('container')
    <form action="/data-peminjaman" method="POST">
        @csrf
        <label for="member">Data Anggota</label>
        <select class="form-control" aria-label="Default select example" name="member_id" id="member_id">
            @foreach ($members as $member)
                <option></option>
                <option value="{{ $member->id }}">{{ $member->no_anggota }} | {{ $member->nama }}</option>
            @endforeach
        </select>
        @error('member')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="book">Data Buku</label>
        <select class="form-control text-capitalize" aria-label="Default select example" name="book_id" id="book_id">
            @foreach ($books as $book)
                @if ($book->stok >= 1)
                    <option></option>
                    <option value="{{ $book->id }}">{{ $book->judul }} | {{ $book->isbn }}</option>
                @else
                    @continue ($book->stok == 0)
                @endif
            @endforeach
        </select>
        @error('book')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tgl_pinjam">Tanggal Peminjaman</label>
        <input id="tgl_pinjam" type="date" name="tgl_pinjam"
            class="form-control @error('tgl_pinjam')
        is-invalid
    @enderror">
        @error('tgl_pinjam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="tempo">Jatuh Tempo</label>
        <input id="tempo" type="date" name="tempo" readonly
            class="form-control @error('tempo')
        is-invalid
    @enderror">
        @error('tempo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="status" hidden>Status</label>
        <input id="status" type="hidden" name="status" value="Dipinjam"
            class="form-control @error('status')
        is-invalid
    @enderror">
        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror


        <a href="/data-peminjaman" class="btn btn-danger float-right mt-2">Batal</a>
        <button type="submit" class="btn btn-primary float-right mr-2 mt-2 tambah-pinjam">Tambah</button>
    </form>
@endsection
@section('script')
    <script src="https://momentjs.com/downloads/moment.min.js"></script>
    <script>
        document.getElementById("tgl_pinjam").onchange = function() {
            let startdate = document.getElementById("tgl_pinjam").value;
            let new_date = moment(startdate, "YYYY-MM-DD");
            let tempo = new_date.add(7, 'days').format('YYYY-MM-DD');
            document.getElementById("tempo").value = tempo;
        }

        $('.tambah-pinjam').click(function() {
            var form = $(this).closest('form');
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin data yang di-input sudah benar?',
                text: "Pastikan Anggota sedang tidak meminjam buku dan telah mengembalikan buku!",
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

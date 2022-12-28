@extends('layouts.main')
@section('container')
    <form action="/data-anggota" method="POST">
        @csrf
        <label for="nama">Nama Lengkap</label>
        <input id="nama" type="text" name="nama" required autofocus
            class="form-control @error('nama')
            is-invalid
        @enderror">

        <label for="nis" class="mt-1">NIS</label>
        <input id="nis" type="text" name="nis" required
            class="form-control @error('nis')
            is-invalid
        @enderror">
        @error('nis')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <label for="jenis_kelamin" class="mt-1">Jenis Kelamin</label>
        <div class="form-check">
            <input type="radio" name="jenis_kelamin" value="Laki-laki"
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

        <label for="kelas" class="mt-1">Kelas</label>
        <select class="form-control" name="kelas">
            <option disabled selected>-- Pilih Kelas --</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>

        <div class="mt-3">
            <a href="/data-anggota" class="btn btn-danger float-right">Batal</a>
            <button type="submit" class="btn btn-primary float-right mr-2 tambah-anggota">Tambah</button>
        </div>
    </form>
@endsection
@section('script')
    <script>
        $('.tambah-anggota').click(function() {
            var form = $(this).closest('form');
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin data yang di-input sudah benar?',
                text: "Pastikan NIS sudah benar karena tidak dapat diubah!",
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

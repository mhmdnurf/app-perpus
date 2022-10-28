@extends('layouts.main')
@section('container')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }} Perpustakaan SD Negeri 017 Senayang</h6>
        </div>
        <div class="card-body">
            <label for="tgl_awal">Tanggal Awal</label>
            <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">

            <label for="tgl_akhir" class="mt-3">Tanggal Akhir</label>
            <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">

            <div class="input-group mt-4 d-flex justify-content-center">
                <a href=""
                    onclick="this.href='/pengembalian/report-cetakPengembalian/'+ document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value"
                    class="btn btn-success" target="_blank">Cetak</a>
            </div>
        </div>
    </div>
@endsection

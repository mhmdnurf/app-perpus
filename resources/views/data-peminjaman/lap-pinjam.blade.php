<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SDN 017 Senayang - Laporan</title>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body id="page-top">

    {{-- Header start --}}
    <img src="img/logo-lingga.png" alt="logo" style="float: left; margin-right: 20px" width="9.3%">
    <img src="img/logo-dinas.png" alt="logo" style="float: right" width="15%">
    <h4 class="fw-bold text-center" style="color: black">SD NEGERI 017 SENAYANG</h4>
    <p style="color: black; font-size: 8pt; text-align: center">TANJUNG LIPAT, KECAMATAN BAKUNG SERUMPUN,
        KABUPATEN
        LINGGA,
        PROVINSI KEPULAUAN RIAU,
        KODE POS
        : 29873</s>
        <hr>
        {{-- Header end --}}

        <!-- Main Content -->
    <div class="form-group">
        <p align="center" style="color: black">Laporan Data Peminjaman</p>
        <table class="static" align="center" rules="all" style="width: 95%; border: solid black; color: black">
            <tr class="text-center">
                <th>No.</th>
                <th>No. Peminjaman</th>
                <th>No. Anggota</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Tanggal Pinjam</th>
                <th>Batas Pengembalian</th>
                <th>Status</th>
            </tr>
            @foreach ($cetakPinjam as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->no_transaksi }}</td>
                    <td>{{ $item->member->no_anggota }}</td>
                    <td>{{ $item->member->nama }}</td>
                    <td>{{ $item->book->judul }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_pinjam)->Format('d-m-Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tgl_pengembalian)->Format('d-m-Y') }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container" class="text-center" style="margin-top: 3cm; color: black">
        <p>Tanjung Lipat, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
        <p style="margin-bottom: 2.5cm">Kepala Sekolah</p>
        <p><u><strong>Khairul Bariyah</strong></u></p>
        <p><strong>NIP. 197009302008012012</strong></p>
    </div>
</body>

</html>

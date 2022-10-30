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


    <!-- Main Content -->
    <div class="fw-bold text-center" style="color: black">
        <h3>SD NEGERI 017 SENAYANG</h3>
        <hr style="border: 3px solid black">
    </div>
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
                    <td>{{ $item->transaction_id }}</td>
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
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SDN 017 Senayang - Kartu Anggota</title>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>

<body id="page-top">
    <style>
        .page-break {
            page-break-after: always;
        }


        .tabel .table.table-bordered {
            border: 1px solid black;
        }

        .tabel .table.table-bordered>thead>tr>th {
            border: 1px solid black;
            color: black;
            background-color: yellow;
        }

        .tabel .table.table-bordered>tbody>tr>td {
            border: 1px solid black;
        }
    </style>



    <!-- Main Content -->
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
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
        style="color: black; border: 1px solid black;">
        <tbody>
            <tr>
                <th colspan="2" class="text-center">Perpustakaan SDN 017 Senayang</th>
            </tr>
            <tr>
                <th colspan="2" class="text-center">Kartu Anggota</th>
            </tr>
            <tr>
                <th>Nomor</th>
                <td>{{ $member->no_anggota }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $member->nama }}</td>
            </tr>
            <tr>
                <th>NIS</th>
                <td>{{ $member->nis }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $member->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $member->kelas }}</td>
            </tr>
        </tbody>
    </table>
    <div style="margin-top: 1cm; color: black">
        <p class="text-center"><b><u>KETENTUAN</b></u></p>
        <ol>
            <li>Anggota wajib menunjukkan kartu anggota perpustakaan kepada petugas perpustakaan.</li>
            <li>Kartu anggota tidak boleh dipinjamkan/dipergunakan/diwakilkan oleh anggota lain.</li>
            <li>Peminjaman buku maksimal sebanyak 1 eksemplar selama 1 minggu (7 hari) dengan waktu pengembalian yang
                sama.</li>
            <li>Keterlambatan pengembalian akan dikenakan denda sebesar Rp.1000 per jumlah hari
                keterlambatan.</li>
            <li>Anggota tidak dibenarkan merusak buku yang telah dipinjamkan.</li>
            <li>Apabila buku yang telah dipinjam hilang ataupun rusak karena kelalaian, diwajibkan untuk mengganti buku
                tersebut dengan buku yang sama atau dalam bentuk fotocopy.</li>
        </ol>
    </div>

    <div class="text-center" style="margin-top: 3cm; color: black">
        <p>Perpustakaan SDN 017 Senayang</p>
        <p>Ttd</p>
        <p>Kepala Sekolah SDN 017 Senayang</p>
    </div>

    <div class="page-break"></div>

    <h5 class="bg-dark text-light text-center">RIWAYAT DENDA</h5>
    <div class="tabel">
        <table class="table table-bordered text-center ">
            <thead>
                <tr class="text-center" style="border: 1px solid black;">
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Telat</th>
                    <th>Denda</th>
                    <th>TTD</th>
                </tr>
            </thead>
            <tbody class="text-light">
                @for ($i = 0; $i < 18; $i++)
                    <tr>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                        <td>A</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>

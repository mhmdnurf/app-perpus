<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SDN 017 Senayang - Laporan</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body id="page-top">
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
    {{-- Header start --}}
    <img src="img/logo-lingga.png" alt="logo" style="float: left; margin-right: 20px" width="3.5%">
    <img src="img/logo-dinas.png" alt="logo" style="float: right" width="6.5%">
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
        <p align="center" style="color: black">Laporan Data Buku</p>
        <table class="table table-bordered" align="center" rules="all">
            <tbody class="text-center">
                <tr class="text-center">
                    <th>No.</th>
                    <th>Judul</th>
                    <th>ISBN</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Pengarang</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Masuk</th>
                </tr>
                @foreach ($cetakBuku as $item)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $item->judul }}</td>
                        <td class="align-middle">{{ $item->isbn }}</td>
                        <td class="align-middle">{{ $item->category->nama }}</td>
                        <td class="align-middle">{{ $item->penerbit }}</td>
                        <td class="align-middle">{{ $item->pengarang }}</td>
                        <td class="align-middle">{{ $item->tahun }}</td>
                        <td class="align-middle">{{ $item->jumlah }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($item->created_at)->Format('d-m-Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="page-break"></div>
    <div class="container" class="text-center float-right" style="margin-top: 3cm; color: black">
        <p>Tanjung Lipat, {{ \Carbon\Carbon::now()->isoFormat('D MMMM Y') }}</p>
        <p style="margin-bottom: 2.5cm">Kepala Sekolah</p>
        <p><u><strong>Khairul Bariyah</strong></u></p>
        <p><strong>NIP. 197009302008012012</strong></p>
    </div>
</body>

</html>

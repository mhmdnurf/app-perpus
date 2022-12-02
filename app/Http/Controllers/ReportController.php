<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Book;
use App\Models\Member;
use App\Models\Borrow;
use App\Models\Returned;

class ReportController extends Controller
{
    public function homeLapAnggota()
    {
        return view('data-anggota.homeLapAnggota', [
            'title' => 'Laporan Anggota'
        ]);
    }


    public function cetakLapAnggota($tgl_awal, $tgl_akhir)
    {
        $cetakAnggota = Member::whereDate('created_at', '>=', $tgl_awal)->whereDate('created_at', '<=', $tgl_akhir)->get();
        view()->share('member', $cetakAnggota);
        $pdf = PDF::loadview('data-anggota.lap-anggota', compact('cetakAnggota'))->setPaper('a4', 'portrait');
        return $pdf->stream('kartu-anggota.pdf');
    }

    public function homeLapBuku()
    {
        return view('data-buku.homeLapBuku', [
            'title' => 'Laporan Buku'
        ]);
    }

    public function cetakLapBuku($tgl_awal, $tgl_akhir)
    {
        $cetakBuku = Book::whereDate('created_at', '>=', $tgl_awal)->whereDate('created_at', '<=', $tgl_akhir)->get();
        view()->share('book', $cetakBuku);
        $pdf = PDF::loadview('data-buku.lap-buku', compact('cetakBuku'))->setPaper('a4', 'portrait');
        return $pdf->stream('laporan-buku.pdf');
    }

    public function homeLapPinjam()
    {
        return view('data-peminjaman.homeLapPinjam', [
            'title' => 'Laporan Peminjaman'
        ]);
    }

    public function cetakLapPinjam($tgl_awal, $tgl_akhir)
    {
        $cetakPinjam = Borrow::whereDate('created_at', '>=', $tgl_awal)->whereDate('created_at', '<=', $tgl_akhir)->get();
        view()->share('borrow', $cetakPinjam);
        $pdf = PDF::loadview('data-peminjaman.lap-pinjam', compact('cetakPinjam'))->setPaper('a4', 'portrait');
        return $pdf->stream('laporan-pinjam.pdf');
    }

    public function homeLapPengembalian()
    {
        return view('data-pengembalian.homeLapPengembalian', [
            'title' => 'Laporan Pengembalian'
        ]);
    }

    public function cetakLapPengembalian($tgl_awal, $tgl_akhir)
    {
        $cetakPengembalian = Returned::whereDate('created_at', '>=', $tgl_awal)->whereDate('created_at', '<=', $tgl_akhir)->get();
        view()->share('returned', $cetakPengembalian);
        $pdf = PDF::loadview('data-pengembalian.lap-pengembalian', compact('cetakPengembalian'))->setPaper('a4', 'portrait');
        return $pdf->stream('laporan-pengembalian.pdf');
    }
}

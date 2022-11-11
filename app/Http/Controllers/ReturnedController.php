<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Returned;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ReturnedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-pengembalian.index', [
            'title' => 'Data Pengembalian',
            'returneds' => Returned::all(),
            'members' => Member::all(),
            'books' => Book::all(),
            'transactions' => Transaction::all()
        ]);
    }

    public function prosesPengembalian(Request $request, $id)
    {
        $request->validate([
            'no_transaksi' => 'required',
            'member_id' => 'required',
            'book_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'tgl_kembalikan' => 'required',
            'keterlambatan' => 'required',
            'status' => 'required',
            'keterangan' => 'required'
        ]);

        Returned::create([
            'no_transaksi' => $request->no_transaksi,
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'tgl_kembalikan' => $request->tgl_kembalikan,
            'keterlambatan' => $request->keterlambatan,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        // dd($request->all());
        return redirect()->route('data-peminjaman.index')->with(['success' => 'Pengembalian berhasil dilakukan']);
    }
}

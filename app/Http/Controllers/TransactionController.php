<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-peminjaman.index', [
            'title' => 'Data Peminjaman',
            'transactions' => Transaction::all(),
            'members' => Member::all(),
            'books' => Book::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-peminjaman.create', [
            'title' => 'Tambah Peminjaman',
            'members' => Member::all(),
            'books' => Book::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $config = [
            'table' => 'transactions',
            'field' => 'no_transaksi',
            'length' => 8,
            'prefix' => 'TRS-'
        ];

        $id = IdGenerator::generate($config);

        $request->validate([
            'member_id' => 'required|max:255',
            'book_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
        ]);

        $returned = Transaction::create([
            'no_transaksi' => $id,
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
            'status' => 'Dipinjam',
            'keterangan' => $request->keterangan
        ]);

        if ($returned) {
            return redirect()
                ->route('data-peminjaman.index')
                ->with([
                    'success' => 'Peminjaman berhasil dilakukan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }

        return redirect('/data-peminjaman')->with('success', 'Peminjaman berhasil dilakukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction, Member $member, Book $book, $id)
    {
        $transaction = Transaction::find($id);
        return view('data-peminjaman.show', [
            'title' => 'Detail Pengembalian Buku',
            'transaction' => $transaction,
            'member' => $member,
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $rules = [
            'no_transaksi' => 'required',
            'member_id' => 'required',
            'book_id' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'tgl_kembalikan' => 'required',
            'keterlambatan' => 'required',
            'status' => 'required',
            'keterangan' => 'required'
        ];
        // dd($request->all());
        $transaction->update($request->validate($rules));
        return redirect('/data-pengembalian')->with('success', 'Proses Pengembalian Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::destroy($id);
        return redirect('/data-peminjaman')->with('success', 'Data peminjaman berhasil dihapus');
    }
}

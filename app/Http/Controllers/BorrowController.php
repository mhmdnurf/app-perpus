<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Returned;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BorrowController extends Controller
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
            'borrows' => Borrow::all(),
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
            'table' => 'borrows',
            'field' => 'no_pinjam',
            'length' => 8,
            'prefix' => 'PNJ-'
        ];

        $id = IdGenerator::generate($config);

        $request->validate([
            'member_id' => 'required|max:255',
            'book_id' => 'required',
            'tgl_pinjam' => 'required',
            'tempo' => 'required',
            'status' => 'required',
        ]);

        $borrow = Borrow::create([
            'no_pinjam' => $id,
            'member_id' => $request->member_id,
            'book_id' => $request->book_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tempo' => $request->tempo,
            'status' => 'Dipinjam'
        ]);

        $book = Book::find($request->book_id);
        $book->stok = $book->stok - 1;
        $book->save();

        if ($borrow) {
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow = Borrow::find($id);

        return view('/data-peminjaman.edit', [
            'title' => 'Edit Data Peminjaman',
            'borrows' => Borrow::all()
        ], compact('borrow'));
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
        $borrow = Borrow::find($id);
        $rules = [
            'tgl_pinjam' => 'required',
            'tempo' => 'required',
            'status' => 'required'
        ];
        $borrow->update($request->validate($rules));

        return redirect('/data-peminjaman')->with('success', 'Peminjaman berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $borrow = Borrow::find($id);
        $book = Book::find($borrow->book_id);
        $book->stok = $book->stok += 1;
        $book->save();
        $borrow->delete();
        return redirect('/data-peminjaman')->with('success', 'Peminjaman berhasil dihapus');
    }
}

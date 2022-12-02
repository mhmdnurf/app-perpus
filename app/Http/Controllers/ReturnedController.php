<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Returned;
use Illuminate\Http\Request;

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
            'borrows' => Borrow::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('data-pengembalian.create', [
            'title' => 'Proses Pengembalian',
            'borrows' => Borrow::all()
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
        $request->validate([
            'borrow_id' => 'required',
            'tgl_kembalikan' => 'required'
        ]);

        $returned = Returned::create([
            'borrow_id' => $request->borrow_id,
            'tgl_kembalikan' => $request->tgl_kembalikan,
            'terlambat' => $request->terlambat,
            'keterangan' => $request->keterangan,
            'denda' => $request->terlambat * 1000
        ]);

        $book = Book::find($request->borrow_id);
        $book->stok = $book->stok + 1;
        $book->save();

        // Borrow::find($request->borrow_id)->update([
        //     'status' => 'Selesai',
        // ]);

        if ($returned) {
            return redirect()
                ->route('data-pengembalian.index')
                ->with([
                    'success' => 'Pengembalian berhasil dilakukan'
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Returned::destroy($id);
        return redirect('/data-pengembalian')->with('success', 'Pengembalian berhasil dihapus');
    }
}

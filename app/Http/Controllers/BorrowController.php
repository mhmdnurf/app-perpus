<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Category;
use Illuminate\Http\Request;
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
            'field' => 'borrow_id',
            'length' => 8,
            'prefix' => 'PNJ-'
        ];

        $id = IdGenerator::generate($config);

        $request->validate([
            'member_id' => 'required|max:255',
            'book_name' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        $borrow = Borrow::create([
            'borrow_id' => $id,
            'member_id' => $request->member_id,
            'book_name' => $request->book_name,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali
        ]);

        if ($borrow) {
            return redirect()
                ->route('data-peminjaman.index')
                ->with([
                    'success' => 'New data has been created successfully'
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
        //
    }

    /*
        AJAX request
   */
    public function getMember(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $members = Member::orderby('member_id', 'asc')->select('nama', 'member_id')->limit(100)->get();
        } else {
            $members = Member::orderby('member_id', 'asc')->select('nama', 'member_id')->where('member_id', 'like', '%' . $search . '%')->limit(100)->get();
        }

        $response = array();
        foreach ($members as $member) {
            $response[] = array("value" => $member->nama, "label" => $member->member_id);
        }

        return response()->json($response);
    }

    /*
        AJAX request
   */
    public function getBook(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $members = Book::orderby('title', 'asc')->select('isbn', 'title')->limit(100)->get();
        } else {
            $members = Book::orderby('title', 'asc')->select('isbn', 'title')->where('title', 'like', '%' . $search . '%')->limit(100)->get();
        }

        $response = array();
        foreach ($members as $member) {
            $response[] = array("value" => $member->isbn, "label" => $member->title);
        }

        return response()->json($response);
    }
}

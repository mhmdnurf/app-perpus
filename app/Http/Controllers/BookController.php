<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('data-buku.index', [
            'title' => 'Data Buku',
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
        return view('data-buku.create', [
            'title' => 'Tambah Buku',
            'categories' => Category::all(),
            'racks' => Rack::all()
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'isbn' => 'unique:books',
            'category_id' => 'required',
            'rack_id' => 'required',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'tahun' => 'required|max:255',
            'jumlah' => 'required'
        ]);
        Book::create($validatedData);

        return redirect('/data-buku')->with('success', 'Buku berhasil ditambah!');
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
        $book = Book::find($id);

        return view('/data-buku.edit', [
            'title' => 'Edit Data Buku',
            'categories' => Category::all(),
            'racks' => Rack::all()
        ], compact('book'));
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
        $book = Book::find($id);
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'rack_id' => 'required',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'tahun' => 'required|max:255',
            'jumlah' => 'required'
        ];
        if ($request->isbn != $book->isbn) {
            $rules['isbn'] = 'unique:books';
        }

        $book->update($request->validate($rules));

        return redirect('/data-buku')->with('success', 'Data Buku berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('/data-buku')->with('success', 'Data buku berhasil dihapus');
    }
}

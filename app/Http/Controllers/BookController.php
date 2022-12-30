<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rack;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
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
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required|max:255',
                'isbn' => 'required|unique:books',
                'category_id' => 'required',
                'rack_id' => 'required',
                'penerbit' => 'required|max:255',
                'pengarang' => 'required|max:255',
                'tahun' => 'required|max:255',
                'jumlah' => 'required'
            ],
            [
                'judul.required' => 'Judul tidak boleh kosong!',
                'isbn.required' => 'Nomor ISBN tidak boleh kosong!',
                'isbn.unique' => 'Nomor ISBN telah terdaftar!',
                'penerbit.required' => 'Penerbit tidak boleh kosong!',
                'pengarang.required' => 'Pengarang tidak boleh kosong!',
                'tahun.required' => 'Tahun tidak boleh kosong!',
                'jumlah.required' => 'Jumlah tidak boleh kosong!'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('errorBook', $validator->errors()->getMessages())->withInput();
        }

        try {
            Book::create([
                'judul' => $request->judul,
                'isbn' => $request->isbn,
                'category_id' => $request->category_id,
                'rack_id' => $request->rack_id,
                'penerbit' => $request->penerbit,
                'pengarang' => $request->pengarang,
                'tahun' => $request->tahun,
                'jumlah' => $request->jumlah,
                'stok' => $request->jumlah
            ]);

            Alert::toast('Data Buku berhasil ditambah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
            return redirect('data-buku');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error during the creation');
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
            'judul' => 'required|max:255',
            'category_id' => 'required',
            'rack_id' => 'required',
            'penerbit' => 'required|max:255',
            'pengarang' => 'required|max:255',
            'tahun' => 'required|max:255',
            'jumlah' => 'required',
            'stok' => 'required'
        ];
        if ($request->isbn != $book->isbn) {
            $rules['isbn'] = 'unique:books';
        }

        $book->update($request->validate($rules));
        Alert::toast('Data Buku berhasil diubah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/data-buku');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        try {
            $book->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                Session::flash('error', 'Buku tidak dapat dihapus karena terhubung dengan data peminjaman!');
                return back();
            }
        }
        Alert::toast('Data Buku berhasil dihapus!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/data-buku');
    }
}

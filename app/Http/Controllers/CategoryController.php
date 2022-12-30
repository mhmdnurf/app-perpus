<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kategori.index', [
            'title' => 'Kategori',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create', [
            'title' => 'Tambah Kategori',
            'categories' => Category::all()
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
        $validator = Validator::make($request->all(), [
            'nama' => 'unique:categories',
        ], [
            'nama.unique' => 'Silahkan cek data kategori terlebih dahulu'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorCategory', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            Category::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan
            ]);
            Alert::toast('Data Kategori Buku berhasil ditambah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
            return redirect('/kategori');
        } catch (\Exception $e) {
            Alert::toast('Data Kategori Buku gagal ditambah!', 'error')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
            return redirect()->back();
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
    public function edit(Request $request, $id)
    {
        $category = Category::find($id);

        return view('/kategori.edit', [
            'title' => 'Edit Kategori'
        ], compact('category'));
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
        $request->validate([
            'nama' => 'required|unique:categories,nama,' . $id,
            'keterangan' => 'max:255'
        ], [
            'nama.unique' => 'Kategori telah terdaftar!'
        ]);

        $category = Category::find($id);
        $category->fill($request->all());
        $category->save();

        Alert::toast('Data Kategori Buku berhasil diubah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        try {
            $category->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                Session::flash('error', 'Kategori tidak dapat dihapus karena terhubung dengan data buku!');
                return back();
            }
        }

        Alert::toast('Kategori Buku berhasil dihapus!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/kategori');
    }
}

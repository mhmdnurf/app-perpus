<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rak.index', [
            'title' => 'Rak Buku',
            'racks' => Rack::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rak.create', [
            'title' => 'Tambah Rak Buku',
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
        $validator = Validator::make($request->all(), [
            'nama' => 'unique:racks',
        ], [
            'nama.unique' => 'Silahkan cek data rak terlebih dahulu'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('errorRack', $validator->errors()->getMessages())
                ->withInput();
        }

        try {
            Rack::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan
            ]);
            Alert::toast('Data Rak Buku berhasil ditambah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
            return redirect('rak');
        } catch (\Exception $e) {
            Alert::toast('Data Rak Buku gagal ditambah!', 'error')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
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
    public function edit($id)
    {
        $rack = Rack::find($id);

        return view('/rak.edit', [
            'title' => 'Edit Rak Buku'
        ], compact('rack'));
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
        $rack = Rack::find($id);
        $rules = ['nama' => 'required'];
        if ($request->nama != $rack->nama) {
            $rules = [
                'nama' => 'unique:racks',
            ];
        }

        $rack->update($request->validate($rules));

        Alert::toast('Data Rak Buku berhasil diubah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/rak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rack::destroy($id);
        Alert::toast('Data Rak Buku berhasil dihapus!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('rak');
    }
}

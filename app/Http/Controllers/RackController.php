<?php

namespace App\Http\Controllers;

use App\Models\Rack;
use Illuminate\Http\Request;
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

        $request->validate([
            'name' => 'required|max:255'
        ]);
        $rack = Rack::create([
            'name' => $request->name,
            'keterangan' => $request->keterangan
        ]);

        if ($rack) {
            return redirect()
                ->route('rak.index')
                ->with([
                    'success' => 'Rak Buku berhasil ditambah'
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

        $rules = [
            'nama' => 'required|max:255',
            'keterangan' => 'max:255'
        ];

        $rack->update($request->validate($rules));

        return redirect('/rak')->with('success', 'Rak Buku berhasil diubah');
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
        return redirect('/rak')->with('success', 'Rak Buku berhasil dihapus');
    }
}

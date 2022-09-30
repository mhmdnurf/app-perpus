<?php

namespace App\Http\Controllers;

use App\Models\Member;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data-anggota.index', [
            'title' => 'Data Anggota',
            'members' => Member::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-anggota.create', [
            'title' => 'Tambah Data Anggota',
            'members' => Member::all()

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
            'nama' => 'required|max:255',
            'nis' => 'unique:members',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'alamat' => 'required|max:255'
        ]);
        Member::create($validatedData);
        return redirect('/data-anggota')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::find($id);
        view()->share('member', $member);
        $pdf = PDF::loadview('data-anggota.print-anggota')->setPaper('a4', 'portrait');
        return $pdf->stream('kartu-anggota.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::find($id);

        return view('/data-anggota.edit', [
            'title' => 'Edit Data Anggota'
        ], compact('member'));
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
        $member = Member::find($id);

        $rules = [
            'nama' => 'required|max:255',
            'tempat_lahir' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
            'alamat' => 'required|max:255'
        ];
        if ($request->nis != $member->nis) {
            $rules['nis'] = 'unique:members';
        }

        $member->update($request->validate($rules));

        return redirect('/data-anggota')->with('success', 'Data Anggota berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
        return redirect('/data-anggota')->with('success', 'Data anggota berhasil dihapus');
    }
}

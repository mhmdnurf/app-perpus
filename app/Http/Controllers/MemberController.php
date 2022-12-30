<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
            'members' => Member::all(),
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
        $config = [
            'table' => 'members',
            'field' => 'no_anggota',
            'length' => 8,
            'prefix' => 'AGG-'
        ];

        $id = IdGenerator::generate($config);

        $validator = Validator::make(
            $request->all(),
            [
                'nama' => 'required|max:255',
                'nis' => 'required|unique:members',
                'jenis_kelamin' => 'required',
                'kelas' => 'required'
            ],
            [
                'nis.required' => 'NIS tidak boleh kosong!',
                'nis.unique' => 'NIS telah digunakan!',
                'nama.required' => 'Nama tidak boleh kosong!',
                'jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong!',
                'kelas.required' => 'Kelas tidak boleh kosong'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->with('errorMember', $validator->errors()->getMessages())->withInput();
        }
        try {
            Member::create([
                'no_anggota' => $id,
                'nama' => $request->nama,
                'nis' => $request->nis,
                'jenis_kelamin' => $request->jenis_kelamin,
                'kelas' => $request->kelas
            ]);

            Alert::toast('Data Anggota berhasil ditambah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
            return redirect('data-anggota');
        } catch (\Exception $e) {
            Alert::toast('Data Anggota gagal ditambah!', 'error')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
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
        $member = Member::find($id);
        view()->share('member', $member);
        $pdf = PDF::loadview('data-anggota.kartu-anggota')->setPaper('a4', 'portrait');
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
            'jenis_kelamin' => 'required',
            'kelas' => 'max:255'
        ];

        $member->update($request->validate($rules));
        Alert::toast('Data Anggota berhasil diubah!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/data-anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $member = Member::find($id);

        try {
            $member->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == 23000) {
                //SQLSTATE[23000]: Integrity constraint violation
                Session::flash('error', 'Data Anggota tidak dapat dihapus karena terhubung dengan data peminjaman!');
                return back();
            }
        }
        Alert::toast('Data Anggota berhasil dihapus!', 'success')->position('top')->autoClose(5000)->timerProgressBar()->hideCloseButton();
        return redirect('/data-anggota');
    }
}

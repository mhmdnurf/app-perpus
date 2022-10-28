<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
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
            'borrows' => Borrow::all(),
            'members' => Member::all(),
            'books' => Book::all()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    public function index()
    {

        $books = Book::count();
        $members = Member::count();
        $borrows = DB::table('borrows')->selectRaw("count(case when status = 'Selesai' then 1 end) as selesai")->selectRaw("count(case when status = 'Dipinjam' then 1 end) as dipinjam")->first();
        return view('dashboard.index', compact('books', 'members', 'borrows'), [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}

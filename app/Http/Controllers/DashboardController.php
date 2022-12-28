<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $data = DB::table('borrows')->where('tgl_pinjam', '<', Carbon::now()->subDays(7)->toDateTimeString())->where('status', '=', 'Dipinjam')->count();
        $books = Book::count();
        $members = Member::count();
        $borrows = DB::table('borrows')->selectRaw("count(case when status = 'Dipinjam' then 1 end) as dipinjam")->first();
        $total_books = Book::sum('jumlah');
        return view('dashboard.index', compact('books', 'members', 'borrows', 'data'), [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}

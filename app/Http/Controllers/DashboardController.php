<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::count();
        return view('dashboard.index', compact('books'), [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    }
}

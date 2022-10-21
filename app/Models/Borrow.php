<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function book()
    {
        $this->belongsTo(Book::class);
    }

    public function member()
    {
        $this->belongsTo(Member::class);
    }
}

<?php

namespace App\Models;


use App\Models\Book;
use App\Models\Borrow;
use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Returned extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function borrow()
    {
        return $this->belongsTo(Borrow::class);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($returned) {
            $returned->borrow()->delete();
        });
    }
}

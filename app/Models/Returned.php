<?php

namespace App\Models;

use App\Models\Transaction;
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

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}

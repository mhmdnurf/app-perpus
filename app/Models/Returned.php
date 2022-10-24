<?php

namespace App\Models;

use App\Models\Borrow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Returned extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function borrow()
    {
        return $this->hasOne(Borrow::class);
    }
}

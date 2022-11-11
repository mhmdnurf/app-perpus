<?php

namespace App\Models;

use App\Models\Rack;
use App\Models\Borrow;
use App\Models\Category;
use App\Models\Returned;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function returneds()
    {
        return $this->hasMany(Returned::class);
    }
}

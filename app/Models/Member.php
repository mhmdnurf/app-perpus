<?php

namespace App\Models;

use App\Models\Borrow;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'member_id',
        'nama',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kelas',
        'alamat'
    ];
    public $incrementing = false;
    public $keyType = 'string';

    public function borrows()
    {
        $this->belongsTo(Borrow::class);
    }
}

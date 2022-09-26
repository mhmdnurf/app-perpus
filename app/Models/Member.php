<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nis',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kelas',
        'alamat'
    ];
}

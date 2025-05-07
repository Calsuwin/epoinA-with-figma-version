<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggar extends Model
{
    protected $fillable = [
        'id_siswa',
        'poin_pelanggar',
        'status_pelanggar', // 1=15 2=20 3=30 4=40 5=100
        'status', // 0=tidak perlu d tindk 1=perlu 2=sudah
    ];
}

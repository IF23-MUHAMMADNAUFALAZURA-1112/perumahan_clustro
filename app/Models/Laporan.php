<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporans'; // opsional

    protected $fillable = [
        'tipe',
        'isi_laporan',
        'tanggal',
    ];
}

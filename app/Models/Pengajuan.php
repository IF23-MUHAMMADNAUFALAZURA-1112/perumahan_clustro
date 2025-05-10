<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = 'pengajuans'; // opsional, kalau kamu pakai nama tabel default Laravel (pengajuans)

    protected $fillable = [
        'nama_warga',
        'jenis_pengajuan',
        'keterangan',
        'status',
    ];
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $table = 'tamus'; // opsional, hanya jika nama tabel tidak standar

    protected $fillable = [
        'nama_tamu',
        'tujuan_rumah',
        'keperluan',
        'waktu_kunjungan',
    ];
}

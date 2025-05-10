<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tamu;

class TamuSeeder extends Seeder
{
    public function run()
    {
        Tamu::create([
            'nama_tamu' => 'Andi Setiawan',
            'tujuan_rumah' => 'Pak Budi Blok A3',
            'keperluan' => 'Mengambil surat domisili',
            'waktu_kunjungan' => now()->subDays(1),
        ]);

        Tamu::create([
            'nama_tamu' => 'Rina Sari',
            'tujuan_rumah' => 'Ibu Siti Blok B5',
            'keperluan' => 'Membawa surat keterangan kehilangan',
            'waktu_kunjungan' => now()->subDays(2),
        ]);

        Tamu::create([
            'nama_tamu' => 'Dedi Prasetyo',
            'tujuan_rumah' => 'Pak Arif Blok C7',
            'keperluan' => 'Membawa dokumen untuk administrasi RT',
            'waktu_kunjungan' => now(),
        ]);
    }
}

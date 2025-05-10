<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laporan;

class LaporanSeeder extends Seeder
{
    public function run()
    {
        Laporan::create([
            'tipe' => 'tamu',
            'isi_laporan' => 'Kunjungan tamu oleh Andi Setiawan untuk mengambil surat domisili.',
            'tanggal' => now()->subDays(1)->toDateString(),
        ]);

        Laporan::create([
            'tipe' => 'pengajuan',
            'isi_laporan' => 'Pengajuan surat keterangan kehilangan oleh Rina Sari.',
            'tanggal' => now()->subDays(2)->toDateString(),
        ]);

        Laporan::create([
            'tipe' => 'pengaduan',
            'isi_laporan' => 'Pengaduan mengenai kebisingan di area Blok B5.',
            'tanggal' => now()->subDays(3)->toDateString(),
        ]);
    }
}


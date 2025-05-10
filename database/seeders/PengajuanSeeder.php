<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengajuan;

class PengajuanSeeder extends Seeder
{
    public function run()
    {
        Pengajuan::create([
            'nama_warga' => 'John Doe',
            'jenis_pengajuan' => 'Surat Domisili',
            'keterangan' => 'Pengajuan untuk membuat surat domisili baru.',
            'status' => 'pending',
        ]);

        Pengajuan::create([
            'nama_warga' => 'Jane Smith',
            'jenis_pengajuan' => 'Surat Keterangan Kehilangan',
            'keterangan' => 'Pengajuan untuk membuat surat kehilangan barang.',
            'status' => 'disetujui',
        ]);

        Pengajuan::create([
            'nama_warga' => 'Michael Johnson',
            'jenis_pengajuan' => 'Kartu Keluarga',
            'keterangan' => 'Permohonan pembuatan kartu keluarga baru.',
            'status' => 'ditolak',
        ]);
    }
}


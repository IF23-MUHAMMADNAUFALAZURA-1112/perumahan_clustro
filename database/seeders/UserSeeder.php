<?php

// database/seeders/UserSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Budi Santoso',
            'password' => Hash::make('password123'),
            'nik' => '3275010101010001',
            'email' => 'budi@example.com',
            'no_whatsapp' => '081234567890',
            'no_telepon' => '0211234567',
            'alamat' => 'Jl. Melati No. 5, RT 01 RW 02',
            'no_rumah' => '05',
            'foto_diri' => null,
            'akses' => 'on',
            'role' => 'warga',
        ]);

        User::create([
            'nama' => 'Satrio Wibowo',
            'password' => Hash::make('satpam123'),
            'nik' => '3275010101010002',
            'email' => 'satpam@example.com',
            'no_whatsapp' => '081234567891',
            'no_telepon' => null,
            'alamat' => 'Pos Jaga Utama RT 01 RW 02',
            'no_rumah' => '01',
            'foto_diri' => null,
            'akses' => 'on',
            'role' => 'satpam',
        ]);
    }
}

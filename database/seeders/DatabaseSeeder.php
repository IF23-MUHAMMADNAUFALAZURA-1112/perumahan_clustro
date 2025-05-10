<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use App\Models\Tamu;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Menambahkan data dummy untuk Admin
        $this->call(AdminSeeder::class);

        $this->call(UserSeeder::class);

        $this->call(LaporanSeeder::class);

        $this->call(PengajuanSeeder::class);

        $this->call(TamuSeeder::class);
    }
}

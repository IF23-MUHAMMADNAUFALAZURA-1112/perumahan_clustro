<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\Tamu;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPengajuan = Pengajuan::count();
        $jumlahTamu = Tamu::count();
        $jumlahLaporan = Laporan::count();

        return view('admin.dashboard', compact('jumlahPengajuan', 'jumlahTamu', 'jumlahLaporan'));
    }
}

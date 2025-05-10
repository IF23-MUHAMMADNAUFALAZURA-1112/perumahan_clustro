<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{
    AuthController,
    DashboardController,
    PengajuanController,
    TamuController,
    LaporanController
};

// Halaman Welcome
Route::get('/', function () {
    return view('welcome');
});

// Login Admin
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');

// Grup dengan middleware auth:admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pengajuan', [PengajuanController::class, 'index'])->name('admin.pengajuan');
    Route::get('/admin/monitoring', [TamuController::class, 'index'])->name('admin.monitoring');
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
});
// // Route::get('/test-email', function () {
// //     try {
// //         \Mail::raw('Tes pengiriman email berhasil!', function ($message) {
// //             $message->to('if23.muhammaddira@mhs.ubpkarawang.ac.id
// //             ')
// //                 ->subject('Test Email   jjjififgggkggkgkgg');
// //         });
// //         return 'Email terkirim!';
// //     } catch (\Exception $e) {
// //         return 'Gagal mengirim email: ' . $e->getMessage();
//     }
// });

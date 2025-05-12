<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAksesController extends Controller
{
    // Menampilkan daftar user dengan fitur pencarian dan pengurutan
    public function index(Request $request)
    {
        $query = User::query();

        // Fitur pencarian berdasarkan nama atau email
        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('nama', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // Urutkan: akses 'off' di atas, kemudian berdasarkan waktu dibuat
        $users = $query->orderByRaw("akses = 'on' ASC")
                       ->orderBy('created_at', 'desc')
                       ->get();

        return view('admin.dataUsers', compact('users'));
    }

    // Mengubah status akses user (on/off)
    public function toggleAkses($id)
    {
        $user = User::findOrFail($id);
        $user->akses = $user->akses === 'on' ? 'off' : 'on';
        $user->save();

        return back()->with('success', 'Akses pengguna berhasil diperbarui.');
    }

    // Mengubah role user (warga <-> satpam)
    public function changeRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = $user->role === 'warga' ? 'satpam' : 'warga';
        $user->save();

        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }
}

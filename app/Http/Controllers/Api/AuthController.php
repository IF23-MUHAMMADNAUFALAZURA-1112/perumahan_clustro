<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|unique:users,nik',
            'email' => 'required|email|unique:users,email',
            'no_whatsapp' => 'required|unique:users,no_whatsapp|string|max:15',
            'no_telepon' => 'nullable|string|max:15',
            'alamat' => 'required|string',
            'no_rumah' => 'required|string|max:10',
            'password' => 'required|string|min:6|confirmed',
            'foto_file' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Upload foto jika ada
        $filename = null;
        if ($request->hasFile('foto_file')) {
            $filename = $request->input('foto'); // Nama unik dari frontend
            $request->file('foto_file')->move(public_path('uploads/foto_user'), $filename);
        }

        // Simpan ke database
        $user = User::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'email' => $request->email,
            'no_whatsapp' => $request->no_whatsapp,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'no_rumah' => $request->no_rumah,
            'password' => Hash::make($request->password),
            'foto_diri' => $filename,
            'role' => 'warga',
            'akses' => 'off',
        ]);

        // Tambahkan URL foto jika tersedia
        $user->foto_url = $filename 
            ? url('uploads/foto_user/' . $filename)
            : null;

        return response()->json([
            'status' => true,
            'message' => 'Registrasi berhasil',
            'user' => $user
        ], 201);
    }

    public function login(Request $request){
    $user = User::where('nik', $request->nik)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'NIK atau password salah'], 401);
    }

    return response()->json([
        'status' => true,
        'message' => 'Login berhasil',
        'akses' => $user->akses,
        'role' => $user->role,
        'user' => $user
    ]);
}

public function sendResetLink(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email'
    ]);

    $token = Str::random(60);

    DB::table('password_resets')->updateOrInsert(
        ['email' => $request->email],
        ['token' => $token, 'created_at' => Carbon::now()]
    );

    $resetLink = "http://localhost:8100/reset-password?token={$token}";

    Mail::raw("Klik link berikut untuk reset password Anda: $resetLink", function ($message) use ($request) {
        $message->to($request->email)
                ->subject('Reset Password Akun Clustro');
    });

    return response()->json(['message' => 'Link reset password telah dikirim.']);
}
public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'password' => 'required|min:6|confirmed'
    ]);

    $record = DB::table('password_resets')->where('token', $request->token)->first();

    if (!$record) {
        return response()->json(['message' => 'Token tidak valid'], 400);
    }

    $user = User::where('email', $record->email)->first();

    if (!$user) {
        return response()->json(['message' => 'User tidak ditemukan'], 404);
    }

    $user->password = Hash::make($request->password);
    $user->save();

    DB::table('password_resets')->where('email', $record->email)->delete();

    return response()->json(['message' => 'Password berhasil diubah']);
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // 🔹 LOGIN
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Validasi password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login gagal, periksa email atau password'], 401);
        }

        // Buat token baru
        $token = $user->createToken('auth_token')->plainTextToken;

        // Update waktu akses terakhir (tidak wajib)
        $user->update(['updated_at' => now()]);

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id'          => $user->id,
                'name'        => $user->name,
                'email'       => $user->email,
                'is_admin'    => $user->is_admin,
                'role'        => $user->is_admin ? 'admin' : 'customer',
                'last_access' => now()->format('Y-m-d H:i:s'),
                'created_at'  => $user->created_at,
                'updated_at'  => $user->updated_at,
            ]
        ]);
    }

    // 🔹 REGISTER
    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:3|confirmed',
        ]);
        
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil',
            'token' => $token,
            'user' => [
                'id'        => $user->id,
                'name'      => $user->name,
                'email'     => $user->email,
                'is_admin'  => $user->is_admin,
                'role'      => $user->is_admin ? 'admin' : 'customer',
                'created_at'=> $user->created_at,
            ]
        ], 201);
    }

    // 🔹 LOGOUT
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout berhasil']);
    }
}

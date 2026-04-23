<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses data login (Hybrid: Session + JWT)
    public function login(Request $request)
    {
        // 1. Validasi inputan form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        /** * 2. Implementasi JWT:
         * Kita mencoba login menggunakan guard 'api' yang sudah kita setting menggunakan driver JWT.
         * Jika berhasil, variabel $token akan berisi string token JWT.
         */
        if (!$token = auth('api')->attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Email atau password yang Anda masukkan salah.',
            ])->onlyInput('email');
        }

        // 3. Implementasi Session (Agar tetap bisa redirect di browser)
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Opsional: Simpan token di session jika ingin ditampilkan/dipakai nanti
            session(['jwt_token' => $token]);

            return redirect()->intended('/fields');
        }

        return back()->withErrors([
            'email' => 'Terjadi kesalahan sistem.',
        ])->onlyInput('email');
    }

    // Memproses logout
   // Memproses logout
    public function logout(Request $request)
    {
        // Gunakan try-catch agar jika JWT gagal/tidak ada, proses logout tetap jalan
        try {
            if (auth('api')->getToken()) {
                auth('api')->logout();
            }
        } catch (\Exception $e) {
            // Abaikan error jika token tidak ditemukan
        }

        // Hapus Session tradisional (Ini yang utama untuk Login di Browser)
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Memproses data pendaftaran
    public function register(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // 2. Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Login otomatis (Session)
        Auth::login($user);

        // 4. Generate JWT Token untuk user baru (Syarat JWT terpenuhi)
        $token = auth('api')->login($user);
        session(['jwt_token' => $token]);

        return redirect('/fields');
    }
}
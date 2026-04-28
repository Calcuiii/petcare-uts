<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    protected $userServiceUrl;

    public function __construct()
    {
        $this->userServiceUrl = env('USER_SERVICE_URL', 'http://127.0.0.1:8001');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Login: ui-service sebagai CONSUMER dari user-service
     * Mengirim POST ke user-service/api/login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            $response = Http::post("{$this->userServiceUrl}/api/login", [
                'email'    => $request->email,
                'password' => $request->password,
            ]);

            $data = $response->json();

            if ($response->successful() && isset($data['data']['access_token'])) {
                session([
                    'token' => $data['data']['access_token'],
                    'user'  => $data['data']['user'],
                ]);

                return redirect()->route('dashboard')
                    ->with('success', 'Selamat datang, ' . $data['data']['user']['name'] . '!');
            }

            return back()->with('error', $data['message'] ?? 'Email atau password salah.');
        } catch (\Exception $e) {
            return back()->with('error', 'Tidak dapat terhubung ke User Service. Pastikan service berjalan di port 8001.');
        }
    }

    /**
     * Register: ui-service sebagai CONSUMER dari user-service
     * Mengirim POST ke user-service/api/register
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email',
            'password' => 'required|string|min:6|confirmed',
            'phone'    => 'nullable|string',
            'address'  => 'nullable|string',
        ]);

        try {
            $response = Http::post("{$this->userServiceUrl}/api/register", [
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => $request->password,
                'phone'    => $request->phone,
                'address'  => $request->address,
                'role'     => 'customer'
            ]);

            $data = $response->json();

            if ($response->successful() && isset($data['data']['access_token'])) {
                session([
                    'token' => $data['data']['access_token'],
                    'user'  => $data['data']['user'],
                ]);

                return redirect()->route('dashboard')
                    ->with('success', 'Registrasi berhasil! Selamat datang, ' . $data['data']['user']['name'] . '!');
            }

            return back()->with('error', $data['message'] ?? 'Registrasi gagal.')->withInput();
        } catch (\Exception $e) {
            return back()->with('error', 'Tidak dapat terhubung ke User Service. Pastikan service berjalan di port 8001.');
        }
    }

    public function logout(Request $request)
    {
        session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; // Tambahkan ini
use App\Models\User;
use App\Models\Car;
use App\Models\Booking;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle login (menggunakan tabel users)
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'email' => 'Email atau password salah.'
            ])->withInput($request->only('email'));
        }

        // Verifikasi password (bcrypt)
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'email' => 'Email atau password salah.'
            ])->withInput($request->only('email'));
        }

        // Cek apakah user adalah admin
        if ($user->role !== 'admin') {
            return back()->withErrors([
                'email' => 'Anda tidak memiliki akses sebagai admin.'
            ])->withInput($request->only('email'));
        }

        // Login berhasil
        Session::put('admin_logged_in', true);
        Session::put('admin_user_id', $user->id);
        Session::put('admin_user_name', $user->name);

        return redirect()->route('admin.dashboard');
    }

    // Show dashboard with real data
    public function dashboard()
    {
        if (!Session::get('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Fetch real data
        $totalModels = Car::count();
        $totalBookings = Booking::count();
        $totalContactMessages = ContactMessage::count();

        $recentBookings = Booking::with(['car'])->latest()->limit(4)->get();
        $recentContactMessages = ContactMessage::latest()->limit(4)->get();

        return view('admin.dashboard', compact('totalModels', 'totalBookings', 'totalContactMessages', 'recentBookings', 'recentContactMessages'));
    }

    // Handle logout
    public function logout()
    {
        Session::forget('admin_logged_in');
        Session::forget('admin_user_id');
        Session::forget('admin_user_name');
        return redirect()->route('admin.login');
    }
}
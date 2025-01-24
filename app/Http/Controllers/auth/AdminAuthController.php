<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\RateLimiter;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }


    public function createUser()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan data user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        event(new Registered($user));

        // Redirect ke halaman tertentu atau login
        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');


        // Check the rate limit before attempting login
        $key = 'login-attempts:' . $request->ip();
        // Cek apakah pengguna sudah mencoba login lebih dari batas yang ditentukan
        if (RateLimiter::tooManyAttempts($key, 5)) {
            // // $seconds = RateLimiter::availableIn($key); // Ini akan memberi tahu berapa detik lagi pengguna dapat mencoba
            // return back()->withErrors(['email' => "Too many login attempts. Please try again in {$seconds} seconds."]);
            session()->flash('error', 'Too many login attempts. Please try again later in 5 minutes.');
            abort(429); // Error 429 akan tetap dikembalikan
        }

        // Menambahkan hit untuk login yang gagal
        RateLimiter::hit($key, 300); // 300 detik


        // dd($credentials, $remember);

        if (Auth::attempt($credentials, $remember)) {
            // dd(Auth::user());
            $request->session()->regenerate();

            // if (Auth::user()->hasRole('user')) {
            //     return redirect()->intended('/');
            // }
            // return redirect()->intended('admin/home');


            return redirect()->intended('admin/home');
        }

        // Jika gagal login, redirect kembali ke form login dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function verifyNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('admin.home');
    }

    public function verifyHandler(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        // dd($user);
        if ($user->hasVerifiedEmail()) {
            return redirect()->back()->with('info', 'User sudah diverifikasi.');
        }

        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent!');
    }
}

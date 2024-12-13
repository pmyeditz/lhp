<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['username' => 'Username atau password salah!'])->withInput();
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function pengguna()
    {
        return view('contents.pengguna');
    }
    public function pengirim()
    {
        return view('contents.pengirim');
    }
    public function penerimaan()
    {
        return view('contents.penerimaan');
    }
    public function produksi()
    {
        return view('contents.produksi');
    }
    public function stok()
    {
        return view('contents.stok');
    }
    public function kualitas()
    {
        return view('contents.kualitas');
    }
    public function sounding()
    {
        return view('contents.sounding');
    }
    public function rincian_p()
    {
        return view('contents.rincian_p');
    }
}

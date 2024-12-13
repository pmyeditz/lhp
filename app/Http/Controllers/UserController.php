<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Mengambil semua data dari tabel users
        return view('contents.pengguna', compact('users'));
    }

    public function store(Request $request)
    {
        User::create($request->validate([
            'nama' => 'required|max:15',
            'username' => 'required|unique:users|max:15',
            'password' => 'required|min:6',
            'tgl_lahir' => 'required|date',
        ]));

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required|max:15',
            'username' => 'required|max:15|unique:users,username,' . $user->id,
            'tgl_lahir' => 'required|date',
        ]);

        $user->update($request->only(['nama', 'username', 'tgl_lahir']));
        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}

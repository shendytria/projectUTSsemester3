<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registrasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'id_jenis_user' => 'nullable|exists:jenis_user,id_jenis_user',
            'no_hp' => 'nullable|string|max:15',
            'pin' => 'nullable|string|max:6',
        ]);

        // Membuat user baru
        $user = User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_jenis_user' => $request->id_jenis_user,
            'no_hp' => $request->no_hp,
            'pin' => $request->pin,
        ]);

        // Setelah register, redirect ke halaman login
        return redirect()->route('main')->with('success', 'Pendaftaran berhasil, silakan login.');
    }
}

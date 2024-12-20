<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('admin.muser.index', compact('data'));
    }

    public function edit($user_id)
    {
        $data = User::find($user_id);
        return view('admin.muser.edit', compact('data'));
    }
    public function create()
    {
        return view('admin.muser.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'nama_user' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_jenis_user' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create([
            'email' => $validatedData['email'],
            'nama_user' => $validatedData['nama_user'],
            'username' => $validatedData['username'],
            'password' => $validatedData['password'], // Use the hashed password here
            'id_jenis_user' => $validatedData['id_jenis_user'],
        ]);

        return redirect('/users')->with('success', 'New user has been added!');
    }

    public function update(Request $request, $user_id)
    {
        $user = User::findOrFail($user_id);

        // Update data user
        $user->email = $request->email;
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->no_hp = $request->no_hp;
        // $user->wa = $request->wa;
        // $user->status_user = $request->status_user;

        // Cek apakah ada file foto yang di-upload
        // if ($request->hasFile('foto')) {
        //     // Hapus foto lama jika ada
        //     if ($user->foto && Storage::exists('public/foto/' . $user->foto)) {
        //         Storage::delete('public/foto/' . $user->foto);
        //     }

        // Simpan foto baru
        // $fileName = time() . '_' . $request->foto->getClientOriginalName();
        // $request->foto->storeAs('public/foto', $fileName);
        // $user->foto = $fileName;
        // }

        // Simpan perubahan
        $user->save();

        // Flash message untuk success
        Session::flash('success', 'Data user berhasil diupdate');

        // Redirect ke halaman daftar user atau halaman lain yang diinginkan
        return redirect('dashboard');
    }

    public function delete($id)
    {
        // Logika untuk menghapus user
        User::find($id)->delete();
        return redirect('users')->with('success', 'User deleted successfully');
    }
    public function destroy($id)
    {
        // Logika untuk menghapus user
        User::find($id)->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}

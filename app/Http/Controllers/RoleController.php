<?php

namespace App\Http\Controllers;
use App\Models\JenisUser;
use App\Models\Menu;
use App\Models\role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function jenis_User() {
        // Mengambil semua data kategori dari tabel kategori
        $jenis_user = JenisUser::all();
        $menus = Menu::all();
        // Mengirim data kategori ke view
        return view('admin.mrole.jenis_user', compact('jenis_user', 'menus'));
    }
        public function Jenis_User_Store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_jenis_user' => 'required|numeric',
            'nama_jenis_user' => 'required'
        ]);        

        role::create([
            'id_jenis_user' => $validatedData['id_jenis_user'],
            'nama_jenis_user' => $validatedData['nama_jenis_user'],
        ]);

        // dd($request->all(),$test);

        // Redirect setelah berhasil menyimpan data
        return redirect()->back()->with('success', 'Jenis User berhasil ditambahkan.');
    }
}

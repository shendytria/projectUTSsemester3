<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        $kategori = Kategori::all();
        return view('buku', compact('buku', 'kategori'));
    }

    public function store(Request $request)
    {
        // Validasi input (optional)
        $request->validate([
            'kode_buku' => 'required',
            'judul_buku' => 'required',
            'pengarang_buku' => 'required',
            'id_kategori' => 'required',
        ]);

        // Simpan ke database
        DB::table('buku')->insert([
            'kode_buku' => $request->kode_buku,
            'judul_buku' => $request->judul_buku,
            'pengarang_buku' => $request->pengarang_buku,
            'id_kategori' => $request->id_kategori,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect dengan pesan sukses
        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }
}

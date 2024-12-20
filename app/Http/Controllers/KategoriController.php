<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        // dd(Auth::check());
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('kategori', compact('buku', 'kategori'));
    }

    public function add_kategori(Request $req){
        // @dd($req);
        Kategori::insert([
            'nama_kategori' => $req->input('nama_kategori')
        ]);
        $kategori = Kategori::all();
        return view('kategori', compact('kategori'));
       }
}

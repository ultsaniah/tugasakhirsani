<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('beranda', compact('produk'));
    }

    public function detail($id)
    {
        $produk = Produk::find($id);
        return view('detail', compact('produk'));
    }

    public function produk()
    {
        $produk = Produk::all();
        return view('produk', compact('produk'));
    }
}

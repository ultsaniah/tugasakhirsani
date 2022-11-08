<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class AdminProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('admin.produk.index', compact('produk'));
    }

    public function tambah()
    {
        return view('admin.produk.tambah');
    }

    public function simpan(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->berat = $request->berat;
        $produk->deskripsi = $request->deskripsi;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = rand() . $file->getClientOriginalName();
            $file->move(public_path() . '/produk', $filename);
            $produk->gambar = $filename;
            $produk->save();
            return redirect()->route('admin.produk');
        }
    }

    public function ubah($id)
    {
        $produk = Produk::find($id);
        return view('admin.produk.tambah', compact('produk'));
    }

    public function edit(Request $request)
    {
        $produk = Produk::find($request->id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->berat = $request->berat;
        $produk->deskripsi = $request->deskripsi;
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $filename = rand() . $file->getClientOriginalName();
            $file->move(public_path() . '/produk', $filename);
            $produk->gambar = $filename;
        }
        $produk->save();
        return redirect()->route('admin.produk');
    }

    public function hapus($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('admin.produk');
    }
}

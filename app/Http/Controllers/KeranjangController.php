<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
            ->get();
        return view('keranjang', compact('keranjang'));
    }

    public function getKeranjang($id)
    {
        $produk = Produk::find($id);
        if ($produk->stok < 1) {
            return 'stok tidak ada';
        }
        $keranjang = new Keranjang();
        $keranjang->user_id = auth()->user()->id;
        $keranjang->produk_id = $id;
        $keranjang->jumlah = 1;
        $keranjang->save();
        return redirect()->route('beranda');
    }

    public function postKeranjang(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        if ($produk->stok < $request->jumlah) {
            return 'stok tidak ada';
        }
        $keranjang = new Keranjang();
        $keranjang->user_id = auth()->user()->id;
        $keranjang->produk_id = $request->produk_id;
        $keranjang->jumlah = $request->jumlah;
        $keranjang->save();
        return redirect()->route('beranda');
    }
}

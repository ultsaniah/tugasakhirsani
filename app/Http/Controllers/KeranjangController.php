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
            ->where('status', 'pending')
            ->get();
        return view('keranjang', compact('keranjang'));
    }

    public function getKeranjang($id)
    {
        $produk = Produk::find($id);
        if ($produk->stok < 1) {
            return 'stok tidak ada';
        }
        $ada =  Keranjang::where('produk_id', $id)
            ->where('user_id', auth()->user()->id)
            ->where('status', 'pending')
            ->first();
        if ($ada) {
            $ada->jumlah = $ada->jumlah + 1;
            $ada->save();
        } else {
            $keranjang = new Keranjang();
            $keranjang->user_id = auth()->user()->id;
            $keranjang->produk_id = $id;
            $keranjang->jumlah = 1;
            $keranjang->save();
        }
        return redirect()->route('keranjang');
    }

    public function postKeranjang(Request $request)
    {
        $produk = Produk::find($request->produk_id);
        if ($produk->stok < $request->jumlah) {
            return 'stok tidak ada';
        }
        $ada =  Keranjang::where('produk_id', $request->produk_id)
            ->where('status', 'pending')
            ->where('user_id', auth()->user()->id)
            ->first();
        if ($ada) {
            $ada->jumlah = (int) $ada->jumlah + (int) $request->jumlah;
            $ada->save();
        } else {
            $keranjang = new Keranjang();
            $keranjang->user_id = auth()->user()->id;
            $keranjang->produk_id = $request->produk_id;
            $keranjang->jumlah = $request->jumlah;
            $keranjang->save();
        }
        return redirect()->route('keranjang');
    }

    public function plus($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->jumlah = $keranjang->jumlah + 1;
        $keranjang->save();
        return redirect()->route('keranjang');
    }

    public function minus($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->jumlah = $keranjang->jumlah - 1;
        $keranjang->save();
        return redirect()->route('keranjang');
    }

    public function hapus($id)
    {
        $keranjang = Keranjang::find($id);
        $keranjang->delete();
        return redirect()->back();
    }
}

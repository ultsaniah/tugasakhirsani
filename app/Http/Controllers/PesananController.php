<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('user_id', auth()->user()->id)
            ->get();
        return view('pesanan', compact('pesanan'));
    }

    public function terima($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status_pembayaran = 'delivered';
        $pesanan->save();
        return redirect()->route('pesanan');
    }

    public function detail($id)
    {
        $keranjang = Keranjang::where('pesanan_id', $id)->get();
        return view('detail-pesanan', compact('keranjang'));
    }

    public function nota($id)
    {
        $keranjang = Keranjang::where('pesanan_id', $id)->get();
        return view('nota', compact('keranjang'));
        return $keranjang;
        return view('detail-pesanan', compact('keranjang'));
    }
}

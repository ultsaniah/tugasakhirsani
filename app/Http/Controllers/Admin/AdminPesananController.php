<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::where('status_pembayaran', 'settlement')->get();
        return view('admin.pesanan', compact('pesanan'));
    }

    public function detail($id)
    {
        $keranjang = Keranjang::where('pesanan_id', $id)->get();
        return view('admin.detail-pesanan', compact('keranjang'));
    }
    public function resi(Request $request)
    {
        $pesanan = Pesanan::find($request->id);
        $pesanan->status_pembayaran = 'send';
        $pesanan->save();
        return redirect()->route('admin.pesanan');
    }
}

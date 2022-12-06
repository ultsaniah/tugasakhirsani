<?php

namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pesanan;

class AdminReturController extends Controller
{
    public function index()
    {
        $retur = Retur::all();
        return view('admin.retur', compact('retur'));
    }

    public function terima($id)
    {
        $retur = Retur::find($id);
        $retur->status = 'accepted';
        $retur->save();
        $pesanan = Pesanan::find($retur->pesanan_id);
        $pesanan->status_pembayaran = 'retur accepted';
        $pesanan->save();
        return redirect()->route('admin.retur');
    }

    public function tolak($id)
    {
        $retur = Retur::find($id);
        $retur->status = 'denied';
        $retur->save();
        $pesanan = Pesanan::find($retur->pesanan_id);
        $pesanan->status_pembayaran = 'retur denied';
        $pesanan->save();
        return redirect()->route('admin.retur');
    }
}

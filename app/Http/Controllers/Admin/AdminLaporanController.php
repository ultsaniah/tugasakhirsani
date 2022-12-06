<?php

namespace App\Http\Controllers\Admin;

use App\Models\Retur;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function pesanan()
    {
        $pesanan = Pesanan::where('status_pembayaran', '!=', 'pending')->get();
        return view('admin.laporan.pesanan', compact('pesanan'));
    }

    public function retur()
    {
        $retur = Retur::all();
        return view('admin.laporan.retur', compact('retur'));
    }

    public function cetak_retur()
    {
        $retur = Retur::all();
        return view('admin.laporan.cetak-retur', compact('retur'));
    }
}

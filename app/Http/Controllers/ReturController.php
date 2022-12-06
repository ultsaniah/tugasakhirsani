<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Retur;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        $retur = Retur::where('user_id', auth()->user()->id)->get();
        return view('retur', compact('retur'));
    }

    public function tambah($id)
    {
        return view('tambah-retur', compact('id'));
    }

    public function simpan(Request $request)
    {
        $pesanan = Pesanan::find($request->kode);
        $pesanan->status_pembayaran = 'retur';
        $pesanan->save();
        $retur = new Retur();
        $retur->user_id = auth()->user()->id;
        $retur->pesanan_id = $request->kode;
        $retur->alasan = $request->alasan;
        $retur->tanggal = Carbon::today()->format('Y-m-d');
        if ($request->hasFile('bukti')) {
            $filename = rand() . $request->file('bukti')->getClientOriginalName();
            $request->file('bukti')->move(public_path() . '/retur', $filename);
            $retur->bukti = $filename;
            $retur->save();
        }
        return redirect()->route('pesanan');
    }
}

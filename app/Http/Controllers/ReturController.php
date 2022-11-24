<?php

namespace App\Http\Controllers;

use App\Models\Retur;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        $retur = Retur::where('user_id', auth()->user()->id)->get();
        return view('retur', compact('retur'));
    }

    public function tambah()
    {
        return view('tambah-retur');
    }

    public function simpan(Request $request)
    {
        $retur = new Retur();
        $retur->user_id = auth()->user()->id;
        $retur->pesanan_id = $request->kode;
        $retur->tanggal = Carbon::today()->format('Y-m-d');
        if ($request->hasFile('bukti')) {
            $filename = rand() . $request->file('bukti')->getClientOriginalName();
            $request->file('bukti')->move(public_path() . '/retur', $filename);
            $retur->bukti = $filename;
            $retur->save();
        }
        return redirect()->route('retur');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\MidtransController;
use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Models\Transaksi;

class CheckoutController extends Controller
{
    public function index()
    {
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
            ->where('status', 'pending')
            ->get();
        $provinsi = RajaOngkirController::provinsi();
        return view('checkout', compact('provinsi', 'keranjang'));
    }

    public function simpan(Request $request)
    {
        $provinsi = explode("|", $request->provinsi);
        $kota = explode("|", $request->kota);
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
            ->where('status', 'pending')
            ->get();
        foreach ($keranjang as $item) {
            $item->status = 'checkout';
            $item->save();
            $cart[] = $item->id;
        }
        $pesanan = new Pesanan();
        $pesanan->keranjang_id = json_encode($cart);
        $pesanan->nama = $request->nama;
        $pesanan->no_hp = $request->hp;
        $pesanan->alamat = $request->alamat . ", " . $kota[1] . ", " . $provinsi[1];
        $pesanan->total = $request->total;
        $pesanan->save();
        return redirect()->route('checkout.bayar', [
            'id' => $pesanan->id
        ]);
    }

    public function bayar($id)
    {
        $pesanan = Pesanan::find($id);
        $user = array(
            'nama' => $pesanan->nama,
            'no_hp' => $pesanan->no_hp,
            'email' => auth()->user()->email,
        );
        $token = MidtransController::config($pesanan->total, json_encode($user));
        return redirect()->back()->with(['token' => $token, 'id' => $pesanan->id]);
    }

    public function simpanBayar(Request $request)
    {
        $json = json_decode($request->json);
        $transaksi = new Transaksi();
        $transaksi->pesanan_id = $request->id;
        $transaksi->transaksi_id = $json->order_id;
        $transaksi->transaksi_status = $json->transaction_status;
        $transaksi->tipe_pembayaran = $json->payment_type;
        $transaksi->bank = $json->va_numbers[0]->bank;
        $transaksi->va = $json->va_numbers[0]->va_number;
        $transaksi->biaya = $json->gross_amount;
        $transaksi->pdf_url = $json->pdf_url;
        return redirect()->route('beranda');
    }
}

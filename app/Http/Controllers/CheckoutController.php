<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\MidtransController;
use App\Models\Pesanan;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Models\Transaksi;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {
        if (empty(auth()->user()->alamat)) {
            return redirect()->route('profil')->with('error', 'Alamat Perlu Diisi');
        }
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
            ->where('status', 'pending')
            ->get();
        $provinsi = RajaOngkirController::provinsi();
        return view('checkout', compact('provinsi', 'keranjang'));
    }

    public function simpan(Request $request)
    {
        $keranjang = Keranjang::where('user_id', auth()->user()->id)
            ->where('status', 'pending')
            ->get();
        $order = Pesanan::orderBy('id', 'DESC')->first();
        if ($order) {
            $id = $order->order_id;
            $ord = explode('-', $id);
            if ($ord[0] == Carbon::today()->format('Ymd')) {
                $number = (int) $ord[1];
                $number++;
            } else {
                $number = 1;
            }
        } else {
            $number = 1;
        }
        $orderId = Carbon::today()->format('Ymd') . '-' . sprintf("%03s", $number);
        $pesanan = new Pesanan();
        $pesanan->order_id = $orderId;
        $pesanan->user_id = auth()->user()->id;
        $pesanan->kurir = $request->kurir;
        $pesanan->ongkir = $request->ongkir;
        $pesanan->total = $request->total;
        $pesanan->save();
        foreach ($keranjang as $item) {
            $item->pesanan_id = $pesanan->id;
            $item->status = 'checkout';
            $item->save();
        }
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
        $pesanan = Pesanan::find($request->id);
        $pesanan->status_pembayaran = $json->transaction_status;
        $pesanan->save();
        $transaksi = new Transaksi();
        $transaksi->pesanan_id = $request->id;
        $transaksi->transaksi_id = $json->order_id;
        $transaksi->transaksi_status = $json->transaction_status;
        $transaksi->tipe_pembayaran = $json->payment_type;
        $transaksi->bank = $json->va_numbers[0]->bank ?? null;
        $transaksi->va = $json->va_numbers[0]->va_number ?? null;
        $transaksi->biaya = $json->gross_amount;
        $transaksi->pdf_url = $json->pdf_url ?? null;
        $transaksi->save();
        return redirect()->route('pesanan.nota', ['id' => $pesanan->id]);
        // return redirect()->route('beranda');
    }
}

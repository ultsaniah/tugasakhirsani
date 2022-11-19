<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\RajaOngkirController;

class ProfilController extends Controller
{
    public function index()
    {
        $provinsi = RajaOngkirController::provinsi();
        return view('profile', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $provinsi = explode("|", $request->provinsi);
        $kota = explode("|", $request->kota);
        $alamat = array(
            'provinsi_id' => $provinsi[0],
            'provinsi' => $provinsi[1],
            'kota_id' => $kota[0],
            'kota' => $kota[1],
            'alamat' => $request->alamat,
        );
        $user = User::find(auth()->user()->id);
        $user->name = $request->nama;
        $user->hp = $request->hp;
        $user->alamat = json_encode($alamat);
        $user->save();
        return redirect()->route('beranda');
    }
}

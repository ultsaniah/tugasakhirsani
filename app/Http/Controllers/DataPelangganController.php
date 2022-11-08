<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class DataPelangganController extends Controller
{
    public function index()
    {
        $pembeli = User::where('role', 'pembeli')->get();
        return view('admin/pelanggan', compact('pembeli'));

        //  $user = Pelanggan::where('level', pelanggan)->get();
        // return view('pelanggan', compact('user'));
    }
}

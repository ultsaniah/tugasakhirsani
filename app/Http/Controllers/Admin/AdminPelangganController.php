<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPelangganController extends Controller
{
    public function index()
    {
        $pembeli = User::where('role', 'pembeli')->get();
        return view('admin.pelanggan', compact('pembeli'));
    }
}

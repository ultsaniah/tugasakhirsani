<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPesananController extends Controller
{
    public function index()
    {
        // $pesanan = P
        return view('admin.pesanan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\RajaOngkirController;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $provinsi = RajaOngkirController::provinsi();
        return view('checkout', compact('provinsi'));
    }
}

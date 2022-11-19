<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public static function config($total, $user)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-yK-3mBmIr5Fu6VzM8CyoQiwl';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $user = json_decode($user);

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => $user->no_hp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return $snapToken;
    }
}

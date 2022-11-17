<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RajaOngkirController extends Controller
{
    public static function provinsi()
    {
        $client = new Client();
        $response = $client->request(
            'GET',
            'https://api.rajaongkir.com/starter/province',
            [
                'headers' => [
                    'key' => env('RAJAONGKIR_API_KEY')
                ]
            ]
        );
        $result = json_decode($response->getBody())->rajaongkir->results;
        return $result;
    }
}

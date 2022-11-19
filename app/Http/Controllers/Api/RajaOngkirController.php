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

    public function kota(Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY')
            ],
            'query' => [
                'province' => $request->provinsi
            ]
        ]);
        $result = json_decode($response->getBody())->rajaongkir->results;
        return $result;
    }

    public function ongkir(Request $request)
    {
        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY')
            ],
            'form_params' => [
                'origin' => '419',
                'destination' => $request->tujuan,
                'weight' => $request->berat,
                'courier' => $request->kurir
            ]
        ]);
        $result = json_decode($response->getBody())->rajaongkir->results[0]->costs[0]->cost[0]->value;
        return $result;
    }
}

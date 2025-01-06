<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class GeoController extends Controller
{
    public function index(Request $request){
        $request->validate(['query' => 'required|string',]);

        $geo = $request->input('query');

        
        try {
            $client = new Client();
            $response = $client->get('https://api.opencagedata.com/geocode/v1/json?q=Frauenplan+1%2C+99423+Weimar%2C+Germany&key=812ced44dec14f70b1c9a5163b765685', [
                'query' => [
                     'q' => $geo,
                    'apiKey' => env('GEOCODING_API_KEY'),
                    
                ],
            ]);
        }
    }
}

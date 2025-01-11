<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller{
    public function getRate(Request $request){
        $currency = 'https://v6.exchangerate-api.com/v6/' .env('EXCHAGE_RATE_API_KEY') . '/latest/' . $currency;

        try {
            $response = Http::get($apiUrl);

            if($response->successful()){
                return response()->json($response->json());
            }

            return response()->json(['error' => 'Cannot get currency data'], 500);
        }catch (\Exception $e){
            return response()->json(['error' => 'Error: ' . $e->getMessage()], 500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
 public function index(){
    return view('currency.index');
 }

 public function indexPost(Request $request){
     $request->validate([ 'query' => 'required|string']);

     $currency = strtoupper($request->input('query'));

            
            $apiUrl = 'https://v6.exchangerate-api.com/v6/e02cdd4905c949ed1f05fcf7/latest/USD';
            $apiKey = 'e02cdd4905c949ed1f05fcf7'; 

        try {
            $response = Http::get($apiUrl, [
                'app_id' => $apiKey,
                'base' => 'KGS',
            ]);

           
            if ($response->successful()) {
                $data = $response->json();

                $rate = $data['rates'][$currency] ?? null;

                
                if ($rate) {
                    return view('currencies.result', [
                        'currency' => $currency,
                        'rate' => $rate,
                    ]);
                } else {
                    return back()->withErrors(['query' => 'Валюта не найдена. Попробуйте снова.']);
                }
            }

            return back()->withErrors(['query' => 'Ошибка при подключении к API.']);
        } catch (\Exception $e) {
            return back()->withErrors(['query' => 'Произошла ошибка: ' . $e->getMessage()]);
        }
    }
}

 



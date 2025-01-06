<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MapController extends Controller
{
    public function index()
    {
        return view('map.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');
        $apiKey = env('OPENCAGE_API_KEY'); 
        $apiUrl = "https://api.opencagedata.com/geocode/v1/json";

        try {
            $response = Http::get($apiUrl, [
                'q' => $city,
                'key' => $apiKey,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                if (isset($data['results'][0])) {
                    $coordinates = $data['results'][0]['geometry'];

                    return view('map.show', [
                        'city' => $city,
                        'coordinates' => $coordinates,
                    ]);
                } else {
                    return back()->withErrors(['city' => 'Город не найден. Попробуйте снова.']);
                }
            }

            return back()->withErrors(['city' => 'Ошибка при подключении к API.']);
        } catch (\Exception $e) {
            return back()->withErrors(['city' => 'Произошла ошибка: ' . $e->getMessage()]);
        }
    }
}

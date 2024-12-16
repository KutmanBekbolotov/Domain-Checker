<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function index(){
        return view('weather.index');
    }

    public function getWeather(Request $request){
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');

        try{
            $client = new Client();
            $response = $client->get('https://api.openweathermap.org/data/2.5/weather', [
                'query' => [
                    'q' => $city,
                    'appid' => env('OPENWEATHER_API_KEY'),
                    'units' => 'metric',
                ],
            ]);

            $data = json_decode($response->getBody(), true);

            return view('weather.result',[
                'city' => $city,
                'weather' => $data,
            ]);
        } catch(\Exception $e){
            return back()->withErrors('error', 'Failed to fetch weather data. Please try again.');
        }
    }
}


http://localhost:8000/weather
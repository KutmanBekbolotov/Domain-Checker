<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MusicController extends Controller
{
    public function index(){
        return view('music.index');
    }

    public function serch(Request $request){

        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->input('query');

        $tokenResponse = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ]);

        if(!$tokenResponse->successful()){
            return redirect()->back()->with('error', 'Failed to authenticate with Spotify');
        }

        $token = $tokenResponse->json()['access_token'];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://api.spotify.com/v1/search', [
            'q' => $query,
            'type' => 'track',
            'limit' => 10,
        ]);

        if($response->succesful()){
            $tracks = $response->json()['tracks']['items'];

            return view('spotify.result', [
                'query' => $query,
                'tracks' => $tracks,
            ]);
        }

        return redirect()->back()->with('error', 'Failed to fetch tracks from Spotify');
    }
}

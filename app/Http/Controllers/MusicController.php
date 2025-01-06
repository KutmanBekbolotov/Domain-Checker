<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MusicController extends Controller
{
    public function index()
    {
        $tokenResponse = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ]);

        if (!$tokenResponse->successful()) {
            return view('spotify.index')->with('error', 'Failed to authenticate with Spotify');
        }

        $token = $tokenResponse->json()['access_token'];

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('https://api.spotify.com/v1/browse/new-releases', [
            'limit' => 20,
            'offset' => 0,
        ]);

        if ($response->successful()) {
            $albums = $response->json()['albums']['items'];
            $tracks = [];

            foreach ($albums as $album) {
                if (!empty($album['artists'])) {
                    $tracks[] = [
                        'name' => $album['name'],
                        'artists' => $album['artists'],
                        'album' => $album,
                        'external_urls' => $album['external_urls'],
                        'images' => $album['images'],
                    ];
                }
            }

            return view('spotify.index', [
                'tracks' => $tracks,
                'offset' => 20,
            ]);
        }

        return view('spotify.index')->with('error', 'Failed to fetch tracks from Spotify');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|string',
        ]);

        $query = $request->input('query');


        $tokenResponse = Http::asForm()->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
            'client_id' => env('SPOTIFY_CLIENT_ID'),
            'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
        ]);

        if (!$tokenResponse->successful()) {
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

        if ($response->successful()) {
            $tracks= $response->json()['tracks']['items'];


       return view('spotify.index', [
              'query' => $query,
                'tracks' => $tracks,
          ]);
        }

        return redirect()->back()->with('error', 'Failed to fetch tracks from Spotify');




    }
}

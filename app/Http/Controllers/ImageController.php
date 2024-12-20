<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use PhpParser\Node\Expr\New_;

class ImageController extends Controller
{
    public function imageGet(){
        return view('image.get');
    }

    public function imagePost(Request $request){
            $request->validate([
                'query'=> 'required|string',
            ]);

            $query = $request->input('query');

            try{
                $client = new Client();
                $response = $client->get('https://api.unsplash.com/photos/random', [
                    'query' =>[
                         'query' =>  $query,
                         'client_id' => env('UNSPLASH_API_KEY'),
                         'count' =>1,
                    ]
                ]);

                $date = json_decode($response->getBody(), true);
                $imageUrl = $date[0]['urls']['regular'];

                return view('image.get', [
                    'query'=>$query,
                    'imageUrl'=>$imageUrl,
                ]);

            }catch(\Exception $e){
                return back()->withErrors('error', 'Failed to fetch image from Unsplash');
            }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DomainController extends Controller
{
    public function index()
    {
        return view('domain-checker.index');
    }

    public function check(Request $request)
    {
        $request->validate([
            'domain' => 'required|regex:/^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        ]); 

        $domain = $request->input('domain');

        try {
            $client = new Client();
            $response = $client->get('https://www.whoisxmlapi.com/whoisserver/WhoisService', [
                'query' => [
                    'apiKey' => env('WHOIS_API_KEY'),
                    'domainName' => $domain,
                    'outputFormat' => 'JSON',
                ],
            ]);

            $data = json_decode($response->getBody(), true);


            $status = $data['WhoisRecord']['registryData']['status'] ?? null;

            $availabilityMessage = 'Неизвестно';
            if ($status === null) {
                $availabilityMessage = 'Свободен';
            } elseif (is_array($status) && in_array('clientTransferProhibited', $status)) {
                $availabilityMessage = 'Занят';
            }

            return view('domain-checker.result', [
                'domain' => $domain,
                'isAvailable' => $availabilityMessage,
            ]);
        } catch (\Exception $e) {
            return back()->withErrors('Ошибка проверки домена: ' . $e->getMessage());
        }
    }
}
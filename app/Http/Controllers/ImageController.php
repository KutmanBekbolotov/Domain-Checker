<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ImageController extends Controller
{
    // Метод для отображения формы ввода
    public function imageGet()
    {
        return view('image.index');  // Отображаем форму ввода запроса
    }

    // Метод для обработки запроса и получения изображения
    public function imagePost(Request $request)
    {
        $request->validate([
            'query' => 'required|string',  // Убедимся, что введенный запрос валиден
        ]);

        $query = $request->input('query');

        try {
            $client = new Client();
            $response = $client->get('https://api.unsplash.com/photos/random', [
                'query' => [
                    'query' => $query,  // Передаем запрос в Unsplash API
                    'client_id' => env('UNSPLASH_API_KEY'),  // Подключаем Access Key
                    'count' => 1,  // Получаем одно случайное изображение
                ]
            ]);

            $data = json_decode($response->getBody(), true);
            $imageUrl = $data[0]['urls']['regular'];  // Извлекаем URL изображения

            // Перенаправляем на результат с изображением
            return view('image.result', [
                'query' => $query,
                'imageUrl' => $imageUrl,
            ]);

        } catch (\Exception $e) {
            return back()->withErrors('error', 'Failed to fetch image from Unsplash');
        }
    }
}

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('home');  
})->name('home');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');

Route::get('/image', [ImageController::class, 'imageGet'])->name('image.get');
Route::post('/image', [ImageController::class, 'imagePost'])->name('image.post');

Route::get('/domain-checker', [DomainController::class, 'index'])->name('domain.index');
Route::post('/check-domain', [DomainController::class, 'check'])->name('check.domain');

Route::get('/currency', [CurrencyController::class, 'index'])->name('currencies.index'); 
Route::post('/currency', [CurrencyController::class, 'indexPost'])->name('currencies.post'); 

Route::get('/videos', [VideoController::class, 'index'])->name('videos.index');


Route::get('/spotify', [MusicController::class, 'index'])->name('spotify.index');
Route::post('/spotify', [MusicController::class, 'search'])->name('spotify.search');

Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::post('/map', [MapController::class, 'search'])->name('map.search');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');








<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('home'); 
})->name('home');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');

Route::get('/image', [ImageController::class, 'imageGet'])->name('image.get');
Route::post('/image', [ImageController::class, 'imagePost'])->name('image.post');

Route::get('/domain-checker', [DomainController::class, 'index'])->name('domain.index');
Route::post('/check-domain', [DomainController::class, 'check'])->name('check.domain');
<<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\CurrencyController; 

Route::get('/', [DomainController::class, 'index'])->name('home');
Route::post('/check-domain', [DomainController::class, 'check'])->name('check.domain');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');

Route::get('/image', [ImageController::class, 'imageGet'])->name('image.get');
Route::post('/image', [ImageController::class, 'imagePost'])->name('image.post');

Route::get('/currency', [CurrencyController::class, 'index'])->name('currencies.index'); 
Route::post('/currency', [CurrencyController::class, 'indexPost'])->name('currencies.post'); 

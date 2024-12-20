<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\WeatherController;

Route::get('/', [DomainController::class, 'index'])->name('home');
Route::post('/check-domain', [DomainController::class, 'check'])->name('check.domain');

Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather', [WeatherController::class, 'getWeather'])->name('weather.get');


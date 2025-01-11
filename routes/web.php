<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::get('/', function () {
    return view('react');  
});

Route::get('/{any}', function () {
    return view('react'); 
})->where('any', '.*');

Route::get('/api/currency', [CurrencyController::class, 'getRate']);







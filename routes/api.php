<?php

use App\Http\Controllers\CurrencyController;

Route::get('/currency', [CurrencyController::class, 'getRate']);

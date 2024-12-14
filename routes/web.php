<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;


Route::get('/', [DomainController::class, 'index'])->name('home');
Route::post('/check-domain', [DomainController::class, 'check'])->name('check.domain');


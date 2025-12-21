<?php

use App\Http\Controllers\User\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::post('/portfolio', [PortfolioController::class, 'store'])->name('portfolio.store');
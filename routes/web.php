<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DictionaryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::post('/', [HomeController::class, 'search']);

Route::get('/dictionary', [DictionaryController::class, 'index']);

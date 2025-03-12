<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DictionaryController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);
Route::post('/search', [HomeController::class, 'search']);
Route::post('/filter', [HomeController::class, 'filter']);

Route::get('/dictionary', [DictionaryController::class, 'index']);
Route::post('/dictionary', [DictionaryController::class, 'store']);

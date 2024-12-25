<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\WishlistController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [HomeController::class, 'index']);
Route::get('/rekomendasi', [RekomendasiController::class, 'index']);
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/wishlist', [WishlistController::class, 'index']);
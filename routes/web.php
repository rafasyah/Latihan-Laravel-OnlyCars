<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MerchandiseController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::resource('events', EventController::class);
Route::resource('gallery', GalleryController::class);
Route::resource('merchandise', MerchandiseController::class);


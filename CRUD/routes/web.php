<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/users', UserController::class);
Route::get('/', action:[HomeController::class, 'index'])->name('home');


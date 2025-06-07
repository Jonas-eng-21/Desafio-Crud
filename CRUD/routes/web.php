<?php

use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/funcionarios', FuncionarioController::class);
Route::resource('/users', UserController::class);
Route::get('/', action:[HomeController::class, 'index'])->name('home');



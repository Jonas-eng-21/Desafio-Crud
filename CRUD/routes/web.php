<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


Route::get('/', action:[HomeController::class, 'index'])->name('home');
Route::get('/users', action:[UserController::class, 'index'])->name('users.index');
Route::get('/users/create', action:[UserController::class, 'create'])->name('users.create');
Route::get('/users', action:[UserController::class, 'store'])->name('users.store');
Route::get('/users{user}', action:[UserController::class, 'show'])->name('users.show');
Route::get('/users{user}/edit', action:[UserController::class, 'edit'])->name('users.edit');
Route::get('/users{user}', action:[UserController::class, 'update'])->name('users.update');
Route::get('/users{user}', action:[UserController::class, 'destroy'])->name('users.destroy');

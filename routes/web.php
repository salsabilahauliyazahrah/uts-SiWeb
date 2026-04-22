<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;

//landing langsung ke halaman login 
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

//setelah login 
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');  
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/tambah', [ProductsController::class, 'create'])->name('tambah')->middleware('auth');
Route::get('/edit/{id}', [ProductsController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/update/{id}', [ProductsController::class, 'update'])->name('update')->middleware('auth');
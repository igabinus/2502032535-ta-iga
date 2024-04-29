<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProjectsController;

Route::get('/', function () {
    return redirect()->route('login');
 });

 Auth::routes();

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/dashboard', [ProjectsController::class, 'dashboard'])->name('dashboard');
Route::post('/projects/storeProject', [ProjectsController::class, 'storeProject'])->name('projects/storeProject');
Route::post('/projects/storeTask', [ProjectsController::class, 'storeTask'])->name('projects/storeTask');

Route::post('/projects/searchProject', [ProjectsController::class, 'searchProject'])->name('projects/searchProject');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

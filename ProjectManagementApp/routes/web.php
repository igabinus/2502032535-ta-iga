<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProjectsController;

//AUTH
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/actionregister', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('/new-project', [ProjectsController::class, 'addNewProject'])->name('addNewProject');

// Route::get('/', function () {
//     return view('dashboard/dashboard');
//  });


Route::get('/dashboard', [ProjectsController::class, 'dashboard'])->name('dashboard');
Route::post('/addProject', [ProjectsController::class, 'addProject'])->name('addProject');
<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/formLogin', [LoginController::class, 'formLogin']);

    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/formRegister', [RegisterController::class, 'formRegister']);
});

Route::middleware(['user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::get('/cari', [DashboardController::class, 'cariPerjalanan'])->name('dashboard');
    Route::get('/urutkan', [DashboardController::class, 'urutkanPerjalanan'])->name('dashboard');

    Route::get('/formPerjalanan', [PerjalananController::class, 'index']);
    Route::post('/simpanPerjalanan', [PerjalananController::class, 'simpanPerjalanan']);

    Route::get('/perjalanan/{id}/delete', [PerjalananController::class, 'delete']);
    Route::get('/perjalanan/{id}/detail', [PerjalananController::class, 'detail']);
    Route::post('/perjalanan/{id}/update', [PerjalananController::class, 'update']);

    Route::post('/logout', [LoginController::class, 'logout']);
});

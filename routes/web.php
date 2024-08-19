<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/index', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/game', [App\Http\Controllers\MainController::class, 'game'])->name('game');
Route::get('/settings', [App\Http\Controllers\MainController::class, 'settings'])->name('settings');
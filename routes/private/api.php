<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::prefix('private')->name('private.')->group(function() {
   Route::prefix('auth')->name('auth.')->group(function() {
       Route::post('/register', [RegisterController::class, 'register'])->name('register');
       Route::post('/login', [LoginController::class, 'login'])->name('login');
   });
});

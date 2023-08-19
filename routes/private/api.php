<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\Staff\StaffController;
use Illuminate\Foundation\Http\Middleware\HandlePrecognitiveRequests;
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
       Route::post('/login', [LoginController::class, 'login'])->name('login');
   });

   Route::middleware(['auth:sanctum'])->group(function() {
      Route::apiResource('staff', StaffController::class)->middleware([HandlePrecognitiveRequests::class]);;
   });
});

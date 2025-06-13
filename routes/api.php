<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ApiKeyMiddleware;
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

// Definisi/Membuat route CRUD users dengan apiResource
Route::middleware(ApiKeyMiddleware::class)->group(function () {
    Route::apiResource('/users', UserController::class);
});

Route::apiResource('/cars', CarController::class);
Route::apiResource('/bookings', BookingController::class);
Route::apiResource('/transactions', TransactionController::class)->only([
    'index', 'show', 'store',
]);

Route::middleware(['check.role:admin'])->group(function () {
    Route::apiResource('categories', CategoryController::class);
});

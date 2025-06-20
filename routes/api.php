<?php

use App\Http\Controllers\AuthController;
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

Route::controller(AuthController::class)->group(function() {
    Route::post('/login', 'login');
});

// Route::apiResource('/bookings', BookingController::class);
// Route::apiResource('/transactions', TransactionController::class)->only([
//     'index', 'show', 'store',
// ]);

Route::apiResource('categories', CategoryController::class)->only(['index', 'show']);

Route::middleware(['auth:sanctum', 'check.role:admin'])->group(function () {
    Route::apiResource('categories', CategoryController::class)->except(['index', 'show']);
    Route::apiResource('cars', CarController::class)->only(["store"]);
});

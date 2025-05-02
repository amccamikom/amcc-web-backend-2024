<?php

use App\Http\Controllers\API\UserController;
use App\Http\Controllers\CarController;
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

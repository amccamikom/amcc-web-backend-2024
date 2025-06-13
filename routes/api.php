<?php

use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\CarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('cars')->group(function () {
        Route::get('/popular', [CarController::class, 'getPopularCars']);
        Route::post('/search', [CarController::class, 'searchCarsByLocation']);
        Route::post('/', [CarController::class, 'getCarById']);
    });

    Route::prefix('bookings')->group(function () {
        Route::post('/all', [BookingController::class, 'getAllBookings']);
        Route::post('/user', [BookingController::class, 'getUserBookings']);
        Route::post('/', [BookingController::class, 'store']);
        Route::put('/{id}', [BookingController::class, 'update']);
        Route::delete('/{id}', [BookingController::class, 'destroy']);
    });
});

<?php

use App\Http\Controllers\Api\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('cars')->group(function () {
        Route::get('/popular', [BookingController::class, 'getPopularCars']);
        Route::post('/search', [BookingController::class, 'searchCarsByLocation']);
        Route::post('/', [BookingController::class, 'getCarById']);
    });

    Route::prefix('bookings')->group(function () {
        Route::post('/user', [BookingController::class, 'getUserBookings']);
        Route::post('/all', [BookingController::class, 'getAllBookings']);
        Route::post('/', [BookingController::class, 'store']);
        Route::put('/{id}', [BookingController::class, 'update']);
        Route::delete('/{id}', [BookingController::class, 'destroy']);
    });
});

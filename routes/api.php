<?php

use App\Http\Controllers\Api\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/cars/popular', [BookingController::class, 'getPopularCars']);

    Route::prefix('bookings')->group(function () {
        Route::get('/', [BookingController::class, 'getUserBookings']);
        Route::post('/', [BookingController::class, 'store']);
        Route::put('/{id}', [BookingController::class, 'update']);
        Route::delete('/{id}', [BookingController::class, 'destroy']);
    });
});

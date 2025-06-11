<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Get a list of all popular cars.
     */
    public function getPopularCars()
    {
        $popularCars = Car::where('is_available', '=', true)
            ->orderBy('rating', 'desc')
            ->get();

        return response()->json([
            'message' => 'Popular cars retrieved successfully',
            'data' => $popularCars,
        ], 200);
    }

    /**
     * Get a list of all bookings.
     */
    public function getUserBookings(Request $request)
    {
        $validated = $request->validate([
            'user_phone' => 'sometimes|string|max:20',
            'id' => 'required|integer|exists:bookings,id',
        ]);

        $userPhone = $validated['user_phone'] ?? null;
        $booking = Booking::with('car')
            ->where('id', '=', $validated['id'])
            ->when($userPhone, function ($query) use ($userPhone) {
                return $query->where('user_phone', '=', $userPhone);
            })
            ->first();

        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        return response()->json([
            'message' => 'User booking retrieved successfully',
            'data' => $booking,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id' => 'required|exists:cars,id',
            'duration_days' => 'required|integer|min:1',
            'booking_date' => 'required|date|after_or_equal:today',
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|max:255',
            'user_phone' => 'required|string|max:20',
        ]);

        $car = Car::find($validated['car_id']);
        if (!$car->is_available) {
            return response()->json(['message' => 'Car is not available for booking'], 400);
        }

        $booking = Booking::create([
            'car_id' => $validated['car_id'],
            'duration_days' => $validated['duration_days'],
            'booking_date' => $validated['booking_date'],
            'user_name' => $validated['user_name'],
            'user_email' => $validated['user_email'],
            'user_phone' => $validated['user_phone'],
        ]);
        $car->update(['is_available' => false]);

        return response()->json([
            'message' => 'Booking created successfully',
            'data' => $booking,
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'car_id' => 'sometimes|exists:cars,id',
            'duration_days' => 'sometimes|integer|min:1',
            'booking_date' => 'sometimes|date|after_or_equal:today',
            'user_name' => 'sometimes|string|max:255',
            'user_email' => 'sometimes|email|max:255',
            'user_phone' => 'sometimes|string|max:20',
        ]);

        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $booking->update($validated);
        $booking->refresh();

        return response()->json([
            'message' => 'Booking updated successfully',
            'data' => $booking,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json(['message' => 'Booking not found'], 404);
        }

        $car = $booking->car;
        $car->update(['is_available' => true]);
        $booking->delete();

        return response()->json([
            'message' => 'Booking deleted successfully',
        ]);
    }
}

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
     * Get single car by id.
     */
    public function getCarById(Request $request) {
        $validated = $request->validate([
            'id' => 'required|exists:cars,id',
        ]);
        
        $car = Car::find($validated['id']);
        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json([
            'message' => 'Car data retrieved successfully',
            'data' => $car,
        ], 200);
    }

    /**
     * Search for cars by location.
     */
    public function searchCarsByLocation(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $location = $validated['location'];
        $cars = Car::where('is_available', '=', true)
            ->where('location', 'LIKE', "%{$location}%")
            ->latest()
            ->get();

        if ($cars->isEmpty()) {
            return response()->json(['message' => 'No cars found in this location'], 404);
        }

        return response()->json([
            'message' => 'Cars retrieved successfully',
            'data' => $cars,
        ], 200);
    }

    /**
     * Get a list of all bookings of the user by phone number.
     */
    public function getAllBookings() 
    {
        $validated = request()->validate([
            'user_phone' => 'required|string|max:20',
        ]);
        $userPhone = $validated['user_phone'] ?? null;
        $bookings = Booking::with('car')
            ->where('user_phone', '=', $userPhone)
            ->get();
        if ($bookings->isEmpty()) {
            return response()->json(['message' => 'No bookings found for this user'], 404);
        }
        return response()->json([
            'message' => 'User bookings retrieved successfully',
            'data' => $bookings,
        ], 200);
    }

    /**
     * Get a user's booking by phone number or booking ID.
     */
    public function getUserBookings(Request $request)
    {
        $validated = $request->validate([
            'user_phone' => 'sometimes|string|max:20',
            'id' => 'required|string|exists:bookings,id',
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

        // Handle car availability if car_id is being updated
        if (isset($validated['car_id']) && $validated['car_id'] != $booking->car_id) {
            // Set previous car as available
            $oldCar = Car::find($booking->car_id);
            if ($oldCar) {
                $oldCar->update(['is_available' => true]);
            }

            // Set new car as unavailable
            $newCar = Car::find($validated['car_id']);
            if ($newCar && $newCar->is_available) {
                $newCar->update(['is_available' => false]);
            } else if ($newCar && !$newCar->is_available) {
                return response()->json(['message' => 'Selected car is not available for booking'], 400);
            }
        }

        $booking->update($validated);

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

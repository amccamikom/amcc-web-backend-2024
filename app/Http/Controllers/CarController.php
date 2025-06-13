<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
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
    public function getCarById(Request $request)
    {
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
}

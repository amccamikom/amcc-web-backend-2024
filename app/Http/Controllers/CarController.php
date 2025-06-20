<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        // --- Cara Lama (Query Builder) ---
        // $cars = DB::table('cars')
        //     ->join('categories', 'cars.category_id', '=', 'categories.id')
        //     ->select('cars.*', 'categories.name as category')
        //     ->get();
        // return response()->json($cars);

        // --- Cara Baru (Eloquent) ---
        $cars = Car::with('category')->latest()->get();

        return response()->json($cars);
    }

    public function show($id)
    {
        // --- Cara Lama (Query Builder) ---
        // $car = DB::table('cars')
        //     ->join('categories', 'cars.category_id', '=', 'categories.id')
        //     ->select('cars.*', 'categories.name as category')
        //     ->where('cars.id', $id)
        //     ->first();
        // if (! $car) {
        //     return response()->json(['message' => 'Car not found'], 404);
        // }
        // return response()->json($car);

        // --- Cara Baru (Eloquent) ---
        // findOrFail() otomatis melempar error 404 jika data tidak ditemukan.
        $car = Car::with('category')->findOrFail($id);
        return response()->json($car);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name'        => 'required|string|max:255',
                'price'       => 'required|numeric',
                'color'       => 'required|string|max:255',
                'status'      => 'required|in:available,unavailable',
                'seat'        => 'required|integer',
                'cc'          => 'required|integer',
                'top_speed'   => 'required|integer',
                'description' => 'nullable|string',
                'location'    => 'required|string',
                'image'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'category_id' => 'required|exists:categories,id',
            ]);

            // Simpan file dan dapatkan full URL-nya
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('images/cars', 'public');
                $validatedData['imageUrl'] = asset('storage/' . $path);
            }

            // Hapus key image agar tidak disimpan ke kolom yang tidak ada
            unset($validatedData['image']);

            $car = Car::create($validatedData);

            return response()->json($car, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // --- Cara Lama (Query Builder) ---
        // $car = DB::table('cars')->find($id);
        // if (! $car) {
        //     return response()->json(['message' => 'Car not found'], 404);
        // }
        // DB::table('cars')->where('id', $id)->update($updateData);
        // return response()->json(['message' => 'Car updated']);

        // --- Cara Baru (Eloquent) ---
        $car = Car::findOrFail($id);

        $validatedData = $request->validate([
            'name'   => 'string|max:255',
            'price'  => 'numeric',
            'status' => 'in:available,unavailable',
        ]);

        $car->update($validatedData);

        return response()->json($car);
    }

    public function destroy($id)
    {
        // --- Cara Lama (Query Builder) ---
        // $deleted = DB::table('cars')->where('id', $id)->delete();
        // if (! $deleted) {
        //     return response()->json(['message' => 'Car not found'], 404);
        // }
        // return response()->json(['message' => 'Car deleted']);

        // --- Cara Baru (Eloquent) ---
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}

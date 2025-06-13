<?php
namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

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
            'imageUrl'    => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // --- Cara Lama (Query Builder) ---
        // $id = DB::table('cars')->insertGetId([
        //     ...
        //     'created_at'   => Carbon::now(),
        //     'updated_at'   => Carbon::now(),
        // ]);
        // return response()->json(['message' => 'Car created', 'id' => $id], 201);

        // --- Cara Baru (Eloquent) ---
        $car = Car::create($validatedData);
        return response()->json($car, 201);
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

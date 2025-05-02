<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')
            ->join('categories', 'cars.category_id', '=', 'categories.id')
            ->select('cars.*', 'categories.name as category_name')
            ->get();
        return response()->json($cars);
    }
    public function show($id)
    {
        $car = DB::table('cars')
            ->join('categories', 'cars.category_id', '=', 'categories.id')
            ->select('cars.*', 'categories.name as category_name')
            ->where('cars.id', $id)
            ->first();
        if (! $car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'price'       => 'required|numeric',
            'color'       => 'required',
            'status'      => 'required|in:available,unavailable',
            'seat'        => 'required|integer',
            'cc'          => 'required|integer',
            'top_speed'   => 'required|integer',
            'description' => 'nullable|string',
            'location'    => 'required|string',
            'imageUrl'    => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);
        $id = DB::table('cars')->insertGetId([
            'name'        => $request->name,
            'price'       => $request->price,
            'color'       => $request->color,
            'status'      => $request->status,
            'seat'        => $request->seat,
            'cc'          => $request->cc,
            'top_speed'   => $request->top_speed,
            'description' => $request->description,
            'location'    => $request->location,
            'imageUrl'    => $request->imageUrl,
            'category_id' => $request->category_id,
        ]);
        return response()->json(['message' => 'Car created', 'id' => $id], 201);
    }
    public function update(Request $request, $id)
    {
        $car = DB::table('cars')->find($id);
        if (! $car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        DB::table('cars')->where('id', $id)->update([
            'name'        => $request->name ?? $car->name,
            'price'       => $request->price ?? $car->price,
            'color'       => $request->color ?? $car->color,
            'status'      => $request->status ?? $car->status,
            'seat'        => $request->seat ?? $car->seat,
            'cc'          => $request->cc ?? $car->cc,
            'top_speed'   => $request->top_speed ?? $car->top_speed,
            'description' => $request->description ?? $car->description,
            'location'    => $request->location ?? $car->location,
            'imageUrl'    => $request->imageUrl ?? $car->imageUrl,
            'category_id' => $request->category_id ?? $car->category_id,
        ]);
        return response()->json(['message' => 'Car updated']);
    }
    public function destroy($id)
    {
        $deleted = DB::table('cars')->where('id', $id)->delete();
        if (! $deleted) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json(['message' => 'Car deleted']);
    }
}

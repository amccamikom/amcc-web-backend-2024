<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function index()
    {
        $cars = DB::table('cars')
            ->join('categories', 'cars.category_id', '=', 'categories.id')
            ->select('cars.*', 'categories.name as category')
            ->get();
        return response()->json($cars);
    }
    public function show($id)
    {
        $car = DB::table('cars')
            ->join('categories', 'cars.category_id', '=', 'categories.id')
            ->select('cars.*', 'categories.name as category')
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
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now(),
        ]);
        return response()->json(['message' => 'Car created', 'id' => $id], 201);
    }
    public function update(Request $request, $id)
    {
        $car = DB::table('cars')->find($id);
        if (! $car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $data = $request->json()->all() ?: $request->all();

        $updateData = [
            'name'        => $data['name'] ?? $car->name,
            'price'       => $data['price'] ?? $car->price,
            'color'       => $data['color'] ?? $car->color,
            'status'      => $data['status'] ?? $car->status,
            'seat'        => $data['seat'] ?? $car->seat,
            'cc'          => $data['cc'] ?? $car->cc,
            'top_speed'   => $data['top_speed'] ?? $car->top_speed,
            'description' => $data['description'] ?? $car->description,
            'location'    => $data['location'] ?? $car->location,
            'imageUrl'    => $data['imageUrl'] ?? $car->imageUrl,
            'category_id' => $data['category_id'] ?? $car->category_id,
            'updated_at'  => Carbon::now(),
        ];

        DB::table('cars')->where('id', $id)->update($updateData);

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

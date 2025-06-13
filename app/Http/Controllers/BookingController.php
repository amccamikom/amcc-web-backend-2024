<?php
namespace App\Http\Controllers;

use App\Models\Booking; // <-- Panggil Model Booking
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'car'])->latest()->get();
        return response()->json($bookings);
    }

    public function show($id)
    {
        $booking = Booking::with(['user', 'car', 'transaction'])->findOrFail($id);
        return response()->json($booking);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id'      => 'required|exists:users,id',
            'car_id'       => 'required|exists:cars,id',
            'fullname'     => 'required|string|max:255',
            'email'        => 'required|email',
            'number_phone' => 'required|string',
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
        ]);

        $booking = Booking::create($validatedData);
        return response()->json($booking, 201);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validatedData = $request->validate([
            'fullname'     => 'string|max:255',
            'email'        => 'email',
            'number_phone' => 'string',
            'start_date'   => 'date',
            'end_date'     => 'date|after_or_equal:start_date',
        ]);

        $booking->update($validatedData);
        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json(['message' => 'Booking deleted successfully']);
    }
}

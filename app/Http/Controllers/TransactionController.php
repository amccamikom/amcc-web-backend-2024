<?php
namespace App\Http\Controllers;

use App\Models\Transaction; // <-- Panggil Model Transaction
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['booking.user', 'booking.car'])->latest()->get();
        return response()->json($transactions);
    }

    public function show($id)
    {
        $transaction = Transaction::with('booking')->findOrFail($id);
        return response()->json($transaction);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'booking_id' => 'required|exists:bookings,id|unique:transactions,booking_id',
            'amount'     => 'required|numeric',
        ]);

        $transaction = Transaction::create($validatedData);
        return response()->json($transaction, 201);
    }

}

<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $availableCars = Car::where('is_available', '=', true)->get();

        $numberOfBookings = 10;

        if ($availableCars->count() < $numberOfBookings) {
            echo "Warning: Not enough available cars to create the desired number of bookings.\n";
            $numberOfBookings = $availableCars->count();
        }

        $carsToBook = $availableCars->random($numberOfBookings);

        foreach ($carsToBook as $car) {
            Booking::factory()->create([
                'car_id' => $car->id,
            ]);

            $car->update(['is_available' => false]);
        }
    }
}

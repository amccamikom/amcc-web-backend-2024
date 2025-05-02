<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { 
        // 1. Category Seeder
        Category::factory(5)->create();

        // 2. User Seeder
        User::factory()->create([
            'role' => 'admin',
            'email' => 'admin@example.com'
        ]);

        User::factory(3)->create([
            'role' => 'customer'
        ]);


        // 3. Car Seeder
        Car::factory(10)->create();
        // 4. Booking Seeder
        Booking::factory(5)->create();
        // 5. Transaction Seeder
        Transaction::factory(5)->create();

    }
}

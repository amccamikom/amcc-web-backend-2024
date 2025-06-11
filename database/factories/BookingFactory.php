<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // car_id 
            'duration_days' => $this->faker->numberBetween(1, 7),
            'booking_date' => $this->faker->dateTimeBetween('-1 month', '+1 week'),
            'user_name' => $this->faker->name(),
            'user_email' => $this->faker->unique()->safeEmail(),
            'user_phone' => '08' . $this->faker->numerify('##########'),
        ];
    }
}

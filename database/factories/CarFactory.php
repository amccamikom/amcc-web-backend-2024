<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $carNames = [
            'Toyota Avanza',
            'Honda Brio',
            'Suzuki Ertiga',
            'Daihatsu Xenia',
            'Mitsubishi Xpander',
            'Toyota Kijang Innova',
            'Daihatsu Terios',
            'Honda HR-V',
            'Toyota Raize',
            'Wuling Air EV',
            'Hyundai Stargazer',
            'Honda CR-V',
            'Suzuki XL7',
            'Toyota Fortuner',
            'Mitsubishi Pajero Sport',
        ];

        $locations = ['Jakarta', 'Surabaya', 'Bandung', 'Medan', 'Semarang', 'Yogyakarta', 'Makassar', 'Denpasar'];

        return [
            'name' => $this->faker->randomElement($carNames) . ' ' . $this->faker->randomElement(['G', 'E', 'S', 'RS', 'V']),
            'color' => $this->faker->safeColorName(),
            'price' => round($this->faker->numberBetween(25, 80)) * 10000,
            'speed' => $this->faker->numberBetween(180, 250),
            'seats' => $this->faker->randomElement([4, 5, 7, 8]),
            'location' => $this->faker->randomElement($locations),
            'rating' => $this->faker->randomFloat(1, 3.5, 5.0),
            'is_available' => true,
        ];
    }
}

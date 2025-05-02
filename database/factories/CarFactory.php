<?php
namespace Database\Factories;

use App\Models\Category;
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
        return [
            'name'        => $this->faker->word(),
            'price'       => $this->faker->randomFloat(2, 200, 1000),
            'color'       => $this->faker->safeColorName(),
            'status'      => $this->faker->randomElement(['available', 'unavailable']),
            'seat'        => $this->faker->numberBetween(2, 7),
            'cc'          => $this->faker->numberBetween(1000, 3000),
            'top_speed'   => $this->faker->numberBetween(120, 300),
            'description' => $this->faker->paragraph(),
            'location'    => $this->faker->city(),
            'imageUrl'    => $this->faker->imageUrl(640, 480, 'car', true),
            'category_id' => Category::inRandomOrder()->first()->id, // get random category id
        ];
    }
}

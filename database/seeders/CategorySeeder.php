<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories = [
      [ 
        "name" => 'Hatchback',
        "description" => "Small car with trunk integrated with cabin, rear door can be opened upwards"
      ],
      [ 
        "name" => 'Sedan',
        "description" => "A car with 3 compartments: engine, passenger cabin, and luggage compartment"
      ],
      [ 
        "name" => 'SUV (Sport Utility Vehicle)',
        "description" => "Suitable for all terrains, high posture, usually 4 wheel drive"
      ],
      [ 
        "name" => 'MPV (Multi Purpose Vehicle)',
        "description" => "Family car, can accommodate 6-8 passengers, comfortable and spacious"
      ],
      [ 
        "name" => 'Crossover',
        "description" => "A combination of an SUV and a sedan/hatchback, lighter than an SUV"
      ],
    ];

    foreach ($categories as $category) {
      Category::create($category);
    }
  }
}

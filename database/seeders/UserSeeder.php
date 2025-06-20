<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = [
      [
        'name'         => 'Tasya Anggraini Firdaus',
        'email'        => 'tasya@gmail.com',
        'phone_number' => '089765678777',
        'password'     => bcrypt('12345678'),
        'role'         => 'customer',
      ],
      [
        'name'         => 'Admin Rental',
        'email'        => 'admin@gmail.com',
        'phone_number' => '089765678877',
        'password'     => bcrypt('12345678'),
        'role'         => 'admin',
      ],
    ];

    foreach ($users as $user) {
      User::create($user);
    }
  }
}

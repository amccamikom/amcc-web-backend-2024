<?php
namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
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
        // Membuat tanggal mulai (start_date) secara acak antara hari ini dan 1 minggu ke depan
        // dateTimeBetween akan menghasilkan objek DateTime acak di antara dua waktu yang ditentukan
        // 'now' berarti waktu saat ini, dan '+1 week' berarti 1 minggu dari sekarang
        $start = $this->faker->dateTimeBetween('now', '+1 week');

        // Membuat tanggal selesai (end_date) dengan menambahkan 1-5 hari ke tanggal mulai
        // clone $start digunakan untuk membuat salinan objek agar tidak mengubah variabel $start asli
        // rand(1, 5) menghasilkan angka acak antara 1 dan 5
        // modify() menambahkan jumlah hari tersebut ke tanggal yang di-clone
        $end = (clone $start)->modify('+' . rand(1, 5) . ' days');

        return [
            'user_id'      => User::inRandomOrder()->first()->id,
            'car_id'       => Car::inRandomOrder()->first()->id,
            'fullname'     => $this->faker->name(),
            'email'        => $this->faker->safeEmail(),
            'number_phone' => $this->faker->phoneNumber(),
            'start_date'   => $start,
            'end_date'     => $end,
        ];
    }
}

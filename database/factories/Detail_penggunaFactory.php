<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class Detail_penggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => $this->faker->unique()->numberBetween(2101, 2130),
            'user_id' => Pengguna::inRandomOrder()->first()->user_id,
            'nama_arab' => $this->faker->name('ar_SA'),
            'nisn' => $this->faker->unique()->randomNumber(4, false),
            'asal' => $this->faker->unique()->city(),
            'tempat_lahir' => $this->faker->unique()->city(),
        ];
    }
}

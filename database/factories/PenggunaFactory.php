<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PenggunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // this seed code
            'nama' => $this->faker->name(),
            'nomer_induk' => $this->faker->unique()->randomNumber(9, false),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('123123'),
            'status' => 1,
            'remember_token' => Str::random(12)
        ];
    }
    
}

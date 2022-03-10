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
            'name' => $this->faker->name(),
            'nomer_induk' => $this->faker->unique()->randomNumber(9, false),
            // 'nomer_induk' => $this->faker->unique()->userName(),
            // 'nomer_induk' => Str::random(10),
            'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }
    
}

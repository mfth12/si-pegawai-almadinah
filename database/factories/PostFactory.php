<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3, 7)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => '<p>'. implode('</p><p>'$this->faker->paragraphs(mt_rand(20,30))). '</p>',
            'body' => collect($this->faker->paragraphs(mt_rand(7, 15)), true)
                ->map(function ($p) {
                    return "<p>$p</p>";
                })->implode(''),
            'kateg_id' => mt_rand(54, 56), //id kategori mulainya dari 54
            'user_id' => mt_rand(2101, 2104),
        ];
    }
}

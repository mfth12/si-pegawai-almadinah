<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul_berita' => $this->faker->sentence($nbWords=4, $variableNbWords=true),
            // 'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'isi_berita' => $this->faker->paragraph($nbSentences=6, $variableNbSentences=true),
            'tanggal' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'gambar' => $this->faker->imageUrl($width = 640, $height = 480),
            'penulis' => $this->faker->unique()->randomNumber(3, false),
        ];
    }
}

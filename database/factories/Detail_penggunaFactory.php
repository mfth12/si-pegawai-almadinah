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
        $kelas = array(
            "1" => "Kelas 7",
            "2" => "Kelas 8",
            "3" => "Kelas 9",
            "4" => "Kelas 10",
            "5" => "Kelas 11",
            "6" => "Kelas 12"
        );
        $sub_kelas = array(
            "1" => "A",
            "2" => "B",
            "3" => "C",
            "4" => "D"
        );
        return [
            // 'user_id' => $this->faker->unique()->numberBetween(2101, 2130),
            // 'user_id' => Pengguna::inRandomOrder()->first()->user_id,
            // 'user_id' => Pengguna::factory()->create()->user_id,
            // 'user_id' => function () {
            //     return Pengguna::create()->user_id;
            // },
            'nama_arab' => $this->faker->name('ar_SA'),
            'nisn' => $this->faker->unique()->randomNumber(4, false),
            'asal' => $this->faker->unique()->city(),
            'tempat_lahir' => $this->faker->unique()->cityName(),
            'kelas' => array_rand(array_flip($kelas)),
            'sub_kelas' => array_rand(array_flip($sub_kelas)),
        ];
    }
    //this is post factory
    // public function definition()
    // {
    //     return [
    //         'title' => $this->faker->sentence(mt_rand(3, 7)),
    //         'slug' => $this->faker->slug(),
    //         'excerpt' => $this->faker->paragraph(),
    //         // 'body' => '<p>'. implode('</p><p>'$this->faker->paragraphs(mt_rand(20,30))). '</p>',
    //         'body' => collect($this->faker->paragraphs(mt_rand(7, 15)), true)
    //             ->map(function ($p) {
    //                 return "<p>$p</p>";
    //             })->implode(''),
    //         'kateg_id' => mt_rand(54, 56), //id kategori mulainya dari 54
    //         'user_id' => mt_rand(2101, 2104),
    //     ];
    // }
}

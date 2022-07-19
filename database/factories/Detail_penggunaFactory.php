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
            'Kelas 7',
            'Kelas 8',
            'Kelas 9',
            'Kelas 10',
            'Kelas 11',
            'Kelas 12'
        );
        $sub_kelas = array(
            'A',
            'B',
            'C',
            'D'
        );
        $arab = \Faker\Factory::create('ar_SA');


        return [
            'nama_arab' => $arab->name(),
            'nisn' => $this->faker->unique()->randomNumber(9, false),
            'asal' => $this->faker->unique()->city(),
            'tempat_lahir' => $this->faker->unique()->cityName(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-24 years', '-15 years'),
            'kelas' => $this->faker->randomElement($kelas),
            'sub_kelas' => $this->faker->randomElement($sub_kelas),
            'alamat' => $this->faker->address(),
            'nama_ayah' => $this->faker->name('male'),
            'pekerjaan_ayah' => $this->faker->jobTitle(),
            'nama_ibu' => $this->faker->name('female'),
            'pekerjaan_ibu' => $this->faker->jobTitle(),
        ];
    }
}

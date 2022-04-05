<?php

namespace Database\Seeders;

use App\Models\Detail_pengguna;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengguna::create([
            'nama' => 'Lord. Miftahul Haq',
            'nomer_induk' => 'mfth12',
            'email' => 'ciftah12@gmail.com',
            'status' => 1,
            'password' => bcrypt('123123'),
        ])->detail()->save(
            Detail_pengguna::factory()->make([
                'asal' => 'bekasi', 'foto' => 'satu.jpg'
            ]));

        // Storage::delete('/foto-pengguna/*');
        Pengguna::factory(90)->create()->each(function ($pengguna) {
            $pengguna->detail()->save(Detail_pengguna::factory()->make());
        });
    }
}

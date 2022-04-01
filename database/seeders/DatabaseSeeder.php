<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Detail_pengguna;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        Pengguna::create([
            'nama' => 'Lord. Miftahul Haq',
            'nomer_induk' => 'mfth12',
            'email' => 'ciftah12@gmail.com',
            'status' => 1,
            'password' => bcrypt('123123'),
        ]);
        //seeding pengguna 24 persons
        Pengguna::factory(24)->hasDetail(1)->create();
        //seeding detail pengguna 24 persons also
        Detail_pengguna::factory(24)->create();
    }
}

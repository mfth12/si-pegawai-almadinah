<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pengguna;
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
            'nama' => 'Miftahul Haq',
            'nomer_induk' => 'mfth12ds',
            'email' => 'ciftah12@gmail.com',
            'status' => 1,
            'password' => bcrypt('123123'),
        ]);
        
        Pengguna::factory(3)->create();

        Kategori::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Kategori::create([
            'nama' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Kategori::create([
            'nama' => 'Culture',
            'slug' => 'culture'
        ]);


        Post::factory(17)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #delete all foto-profil in directory
        Storage::deleteDirectory('foto-pengguna');
        #do seeding
        $this->call([
            PenggunaSeeder::class,
            BeritaSeeder::class,
            KonfigSeeder::class,
            LevelPenggunaSeeder::class,
        ]);
    }
}

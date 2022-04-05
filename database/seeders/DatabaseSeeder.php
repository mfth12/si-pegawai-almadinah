<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use App\Models\Pengguna;
use App\Models\Detail_pengguna;
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
        $this->call([
            PenggunaSeeder::class,
        ]);

    }
}

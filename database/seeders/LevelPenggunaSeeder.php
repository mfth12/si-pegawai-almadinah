<?php

namespace Database\Seeders;

use App\Models\Level_pengguna;
use Illuminate\Database\Seeder;

class LevelPenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level_pengguna::create([
            'nama_level' => 'SuperAdmin',
            'akses' => '*',
            'keterangan' => 'Full akses',
            'status' => true,
        ]);
        
        Level_pengguna::create([
            'nama_level' => 'KepalaSekolah',
            'akses' => '*',
            'keterangan' => 'Akses kelurahan dalam unit sekolah',
            'status' => true,
        ]);
        
        Level_pengguna::create([
            'nama_level' => 'Pegawai',
            'akses' => '*',
            'keterangan' => 'Akses pegawai',
            'status' => true,
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Konfig;
use Illuminate\Database\Seeder;

class KonfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Konfig::create([
            'nama_sistem' => 'Sistem Pegawai',
            'unik' => 'Al-Madinah',
            'nama_lembaga' => 'Yayasan Pendidikan Al-Madinah',
            'alamat_lembaga' => 'Jl. Merpati KM. 11, Kel. Batu 9, Tanjungpinang Timur, Tanjungpinang, Kepulauan Riau',
            'logo_lembaga' => 'logo-yys-almadinah.png',
            'ikon' => 'logo-yys-almadinah-red.png',
            'email_resmi' => 'humas.almadinahkepri@gmail.com',
            'no_telp' => '0822-6708-5398',
            'periode_aktif' => 2022,
        ]);
    }
}

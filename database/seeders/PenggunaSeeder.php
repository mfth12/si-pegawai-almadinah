<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\Detail_pengguna;
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
            'nama' => 'Miftahul Haq',
            'nomer_induk' => 'mfth12',
            'email' => 'ciftah12@gmail.com',
            'status' => 1,
            'password' => bcrypt('123123'),
        ])->detail()->save(
            Detail_pengguna::factory()->make([
                'asal' => 'bekasi', 'foto' => 'satu.jpg'
            ])
        );

        // Storage::delete('/foto-pengguna/*');
        $user = Pengguna::factory(90)->create()->each(function ($pengguna) {
            $pengguna->detail()->save(Detail_pengguna::factory()->make());
        });

        //role dan permission
        // $role = Role::create([
        //     'name' => 'superadmin'
        // ]);
        // $role = Role::create([
        //     'name' => 'admin'
        // ]);
        // $role = Role::create([
        //     'name' => 'santri'
        // ]);

        // $permissions = Permission::pluck('user_id', 'user_id')->all();

        // $role->syncPermissions($permissions);

        // $user->assignRole([$role->user_id]);
        ////
    }
}

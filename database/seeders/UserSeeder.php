<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yuri Chagas',
            'email' => 'yuri.alec@hotmail.com',
            'password' => bcrypt('123456'),
            'perfil_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'João',
            'email' => 'joao@email.com',
            'password' => bcrypt('123456'),
            'perfil_id' => 2,
        ]);
    }
}

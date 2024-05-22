<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil')->insert([
            'id' => 1,
            'nome' => 'Admin',
        ]);
        DB::table('perfil')->insert([
            'id' => 2,
            'nome' => 'Técnico',
        ]);
    }
}

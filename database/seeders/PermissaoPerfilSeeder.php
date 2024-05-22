<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissaoPerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissoes = DB::table('permissao')->select('id')->get();

        foreach ($permissoes as $key => $value) {
            DB::table('permissao_perfil')->insert([
                'perfil_id' => 1,
                'permissao_id' => $value->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissoes = [
            'marca.index',
            'marca.store',
            'marca.show',
            'marca.update',
            'marca.delete',
            'modelo.index',
            'modelo.store',
            'modelo.show',
            'modelo.update',
            'modelo.delete',
            'carro.index',
            'carro.store',
            'carro.show',
            'carro.update',
            'carro.delete',
            'cliente.index',
            'cliente.store',
            'cliente.show',
            'cliente.update',
            'cliente.delete',
            'locacao.index',
            'locacao.store',
            'locacao.show',
            'locacao.update',
            'locacao.delete'
        ];

        foreach ($permissoes as $permissao) {
            DB::table('permissao')->insert([
                'nome' => $permissao,
            ]);
        }
    }
}

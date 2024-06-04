<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class menuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            'cliente' => [
                'label' => 'Clientes',
                'icon' => 'fa-solid fa-users',
                'url' => '/locadora/clientes/',
            ],
            'carro' => [
                'label' => 'Carros',
                'icon' => 'fa-solid fa-car',
                'url' => '/locadora/carros/',
            ],
            'marca' => [
                'label' => 'Marcas',
                'icon' => 'fa-solid fa-font-awesome',
                'url' => '/locadora/marcas/',
            ],
            'locacoes' => [
                'label' => 'Locação',
                'icon' => 'fa-solid fa-person-walking-arrow-loop-left',
                'url' => '/locadora/locacoes/',
            ],
            'modelo' => [
                'label' => 'Modelos',
                'icon' => 'fa-solid fa-car-tunnel',
                'url' => '/locadora/modelos/',
            ],
        ];

        foreach ($menus as $key => $menu) {
            DB::table('menus')->insert([
                'label' => $menu['label'],
                'icon' => $menu['icon'],
                'url' => $menu['url'],
            ]);
        }
    }
}

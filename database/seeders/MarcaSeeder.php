<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Marca;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = [
            ['nome' => 'Peugeot'],
            ['nome' => 'Renault'],
            ['nome' => 'Chevrolet'],
            ['nome' => 'Ford'],
            ['nome' => 'Fiat'],
            ['nome' => 'Toyota'],
            ['nome' => 'Hyundai'],
            ['nome' => 'BYD'],
            ['nome' => 'Volkswagen'],
        ];

        foreach ($marcas as $marca) {
            Marca::create($marca);
        }
    }
}


<?php

namespace Database\Seeders;

use App\Models\Cor;
use Illuminate\Database\Seeder;

class CorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cor::create([
            'nome' => 'AZUL'
        ]);

        Cor::create([
            'nome' => 'AMARELO'
        ]);

        Cor::create([
            'nome' => 'VERDE'
        ]);

        Cor::create([
            'nome' => 'VERMELHO'
        ]);

        Cor::create([
            'nome' => 'PRETO'
        ]);

        Cor::create([
            'nome' => 'BRANCO'
        ]);

        Cor::create([
            'nome' => 'ROSA'
        ]);

        Cor::create([
            'nome' => 'LARANJA'
        ]);
    }
}

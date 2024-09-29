<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modelo; // Certifique-se de que o namespace está correto
use App\Models\Marca;  // Certifique-se de que o namespace está correto

class ModeloSeeder extends Seeder
{
    public function run()
    {
        // Certifique-se de que os IDs correspondam ao que foi inserido na MarcaSeeder
        $marcas = Marca::all()->pluck('id')->toArray();

        $modelos = [
            ['name' => 'Fusca', 'marca_id' => $marcas[0]], // Exemplo: Fusca associado à primeira marca
            ['name' => 'Civic', 'marca_id' => $marcas[1]], // Associado à segunda marca
            ['name' => 'Corolla', 'marca_id' => $marcas[2]], // Associado à terceira marca
            ['name' => 'Onix', 'marca_id' => $marcas[3]], // Associado à quarta marca
            ['name' => 'Palio', 'marca_id' => $marcas[4]], // Associado à quinta marca
            // Adicione mais modelos conforme necessário
        ];

        foreach ($modelos as $modelo) {
            Modelo::create($modelo); // Certifique-se de que a classe Modelo está correta
        }
    }
}

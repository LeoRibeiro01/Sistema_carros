<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\Marca;
use App\Models\Estado;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    // Exibe a lista de carros
    public function index()
    {
        $carros = Carro::with(['modelo', 'cor', 'estado'])->get();
        return view('carro.index', compact('carros'));
    }

    // Exibe o formulário para criar um novo carro
    public function create()
{
    $marcas = Marca::all(); // Carrega todas as marcas
    $modelos = Modelo::all(); // Carrega todos os modelos
    $cores = Cor::all(); // Carrega todas as cores
    $estados = Estado::all(); // Carrega todos os estados

    return view('carro.create', compact('marcas', 'modelos', 'cores', 'estados'));
}


    // Salva um novo carro
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|min:8|max:8',
            'modelo_id' => 'required|exists:modelos,id',
            'estado_id' => 'required|exists:estados,id',
            'cor_id' => 'required|exists:cors,id',
        ]);

        Carro::create($request->all());
        return redirect()->route('carro.index')->with('success', 'Carro criado com sucesso.');
    }

    // Exibe o formulário para editar um carro existente
    public function edit(Carro $carro)
    {
        $modelos = Modelo::all();
        $cores = Cor::all();
        $estados = Estado::all();
        return view('carro.edit', compact('carro', 'modelos', 'cores', 'estados'));
    }

    // Atualiza um carro existente
    public function update(Request $request, Carro $carro)
    {
        $request->validate([
            'placa' => 'required|string|min:8|max:8',
            'modelo_id' => 'required|exists:modelos,id',
            'estado_id' => 'required|exists:estados,id',
            'cor_id' => 'required|exists:cors,id',
        ]);

        $carro->update($request->all());
        return redirect()->route('carro.index')->with('success', 'Carro atualizado com sucesso.');
    }

    // Exibe os detalhes de um carro específico
    public function show(Carro $carro)
    {
        return view('carro.show', compact('carro'));
    }

    // Deleta um carro
    public function destroy(Carro $carro)
    {
        $carro->delete();
        return redirect()->route('carro.index')->with('success', 'Carro deletado com sucesso.');
    }
}

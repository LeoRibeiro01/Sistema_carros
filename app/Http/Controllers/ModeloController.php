<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    // Exibe a lista de modelos
    public function index()
    {
        $modelos = Modelo::all();
        return view('modelo.index', compact('modelos'));
    }

    // Exibe o formulário para criar um novo modelo
    public function create()
    {
        $marcas = Marca::all(); // Para exibir as marcas disponíveis no select
        return view('modelo.create', compact('marcas'));
    }

    // Salva um novo modelo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        Modelo::create($request->all());
        return redirect()->route('modelo.index')->with('success', 'Modelo criado com sucesso.');
    }

    // Exibe o formulário para editar um modelo existente
    public function edit(Modelo $modelo)
    {
        $marcas = Marca::all(); // Para permitir a mudança de marca ao editar
        return view('modelo.edit', compact('modelo', 'marcas'));
    }

    // Atualiza um modelo existente
    public function update(Request $request, Modelo $modelo)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'marca_id' => 'required|exists:marcas,id',
        ]);

        $modelo->update($request->all());
        return redirect()->route('modelo.index')->with('success', 'Modelo atualizado com sucesso.');
    }

    public function show($id)
    {
        // Carrega o modelo com a relação de marca
        $modelo = Modelo::with('marca')->findOrFail($id);

        // Retorna a view 'modelo.show' com o modelo carregado
        return view('modelo.show', compact('modelo'));
    }

    // Deleta um modelo
    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return redirect()->route('modelo.index')->with('success', 'Modelo deletado com sucesso.');
    }
}

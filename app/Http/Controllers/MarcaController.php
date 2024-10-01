<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    // Exibe a lista de marcas
    public function index()
    {
        $marcas = Marca::all();
        return view('marca.index', compact('marcas'));
    }

    // Exibe o formulário para criar uma nova marca
    public function create()
    {
        return view('marca.create');
    }

    // Salva uma nova marca
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
        ]);

        Marca::create($request->all());
        return redirect()->route('marca.index')->with('success', 'Marca criada com sucesso.');
    }

    // Exibe o formulário para editar uma marca existente
    public function edit(Marca $marca)
    {
        return view('marca.edit', compact('marca'));
    }

    // Atualiza uma marca existente
    public function update(Request $request, Marca $marca)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
        ]);

        $marca->update($request->all());
        return redirect()->route('marca.index')->with('success', 'Marca atualizada com sucesso.');
    }

    public function show($id)
    {
        // Carrega a marca com seus modelos relacionados
        $marca = Marca::with('modelos')->findOrFail($id);

        // Retorna a view 'marca.show' com a marca carregada
        return view('marca.show', compact('marca'));
    }

    // Deleta uma marca
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return redirect()->route('marca.index')->with('success', 'Marca deletada com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    // Exibe a lista de cores
    public function index()
    {
        $cors = Cor::all();
        return view('cor.index', compact('cors'));
    }

    // Exibe o formulário para criar uma nova cor
    public function create()
    {
        return view('cor.create');
    }

    // Salva uma nova cor
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
        ]);

        Cor::create($request->all());
        return redirect()->route('cor.index')->with('success', 'Cor criada com sucesso.');
    }

    // Exibe o formulário para editar uma cor existente
    public function edit(Cor $cor)
    {
        return view('cor.edit', compact('cor'));
    }

    // Atualiza uma cor existente
    public function update(Request $request, Cor $cor)
    {
        $request->validate([
            'nome' => 'required|string|max:50',
        ]);

        $cor->update($request->all());
        return redirect()->route('cor.index')->with('success', 'Cor atualizada com sucesso.');
    }

    // Deleta uma cor
    public function destroy(Cor $cor)
    {
        $cor->delete();
        return redirect()->route('cor.index')->with('success', 'Cor deletada com sucesso.');
    }
}

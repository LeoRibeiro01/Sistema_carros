<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Auth;
use App\Models\Carro;
use App\Models\Modelo;
use App\Models\Cor;
use App\Models\Estado;
use Dompdf\Dompdf; // Importa a classe Dompdf
use Dompdf\Options; // Importa a classe Options
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
        $modelos = Modelo::with('marca')->get(); // Carrega todos os modelos com suas marcas
        $cors = Cor::all(); // Carrega todas as cores
        $estados = Estado::all(); // Carrega todos os estados

        return view('carro.create', compact('modelos', 'cors', 'estados'));
    }

    // Salva um novo carro
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|regex:/^[A-Z]{3}-\d{4}$/|unique:carros', // Validação para a placa
            // Adicione aqui outras validações para os outros campos
        ]);

        // Se a validação passar, continue com a criação do carro
        $carro = Carro::create([
            'placa' => $request->placa,
            'modelo_id' => $request->modelo_id,
            'cor_id' => $request->cor_id,
            'estado_id' => $request->estado_id,
        ]);

        return redirect()->route('carro.index')->with('success', 'Carro adicionado com sucesso!');
    }

    // Exibe o formulário para editar um carro existente
    public function edit(Carro $carro)
    {
        $modelos = Modelo::with('marca')->get(); // Carrega os modelos com marcas para edição
        $cors = Cor::all();
        $estados = Estado::all();
        return view('carro.edit', compact('carro', 'modelos', 'cors', 'estados'));
    }

    // Atualiza um carro existente
    public function update(Request $request, Carro $carro)
    {
        $this->validateRequest($request);

        $carro->update($request->all());
        return redirect()->route('carro.index')->with('success', 'Carro atualizado com sucesso.');
    }

    // Exibe os detalhes de um carro específico
    public function show(Carro $carro)
{
    // Carrega as relações do carro com modelo, cor e estado
    $carro = Carro::with(['modelo.marca', 'cor', 'estado'])->findOrFail($carro->id);

    // Retorna a view 'carro.show' com o carro carregado
    return view('carro.show', compact('carro'));
}

    // Deleta um carro
    public function destroy(Carro $carro)
    {
        $carro->delete();
        return redirect()->route('carro.index')->with('success', 'Carro deletado com sucesso.');
    }

    public function report()
    {
        // Obtém todos os carros com as relações de modelo, cor e estado
        $carros = Carro::with(['modelo', 'cor', 'estado'])->get();

        // Configura o Dompdf
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $dompdf = new Dompdf($options);

        // Gera a view para o PDF
        $pdfView = view('carro.report', compact('carros'));

        // Carrega a view no Dompdf
        $dompdf->loadHtml($pdfView);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Exibe o PDF no navegador
        return $dompdf->stream('relatorio_carros.pdf', ["Attachment" => false]);
    }

    public function singleReport($id)
    {
        // Obtém o carro específico com as relações de modelo, cor e estado
        $carro = Carro::with(['modelo', 'cor', 'estado'])->findOrFail($id);

        // Configura o Dompdf
        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $dompdf = new Dompdf($options);

        // Gera a view para o PDF
        $pdfView = view('carro.singleReport', compact('carro'));

        // Carrega a view no Dompdf
        $dompdf->loadHtml($pdfView);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Exibe o PDF no navegador

        return $dompdf->stream('relatorio_carro_'.$carro->placa.'.pdf', ["Attachment" => false]);
    }


    // Exibe os gráficos
    public function graph()
    {



        $cors = Cor::with('carros')->orderBy('nome')->get();

        dd($cors);
        $data = [
            ["COR", "NÚMERO DE CARROS"],
        ];

        foreach ($cors as $cor) {
            $data[] = [
                $cor->nome,
                $cor->carros->count() // Utiliza o método count() para contar os carros
            ];
        }

        $data = json_encode($data);
        return view('carro.graph', compact('data')); // Verifique se a view 'carro.graph' existe
    }

    // Valida os dados do formulário
    private function validateRequest(Request $request)
    {
        $request->validate([
            'placa' => 'required|string|min:8|max:8',
            'modelo_id' => 'required|exists:modelos,id',
            'estado_id' => 'required|exists:estados,id',
            'cor_id' => 'required|exists:cors,id',
        ]);
    }
}

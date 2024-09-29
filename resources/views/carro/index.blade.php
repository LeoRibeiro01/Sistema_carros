<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Carros</h1>
        <a href="{{ route('carro.create') }}" class="btn btn-primary mb-3">Adicionar Novo Carro</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th>Estado</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carros as $carro)
                    <tr>
                        <td>{{ $carro->id }}</td>
                        <td>{{ $carro->placa }}</td>
                        <td>{{ $carro->modelo->name }}</td>
                        <td>{{ $carro->cor->nome }}</td>
                        <td>{{ $carro->estado->nome }}</td>
                        <td>
                            <a href="{{ route('carro.edit', $carro->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('carro.destroy', $carro->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

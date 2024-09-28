<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cores</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Cores</h1>
        <a href="{{ route('cor.create') }}" class="btn btn-primary mb-3">Adicionar Nova Cor</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cors as $cor)
                    <tr>
                        <td>{{ $cor->id }}</td>
                        <td>{{ $cor->nome }}</td>
                        <td>
                            <a href="{{ route('cor.edit', $cor->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('cor.destroy', $cor->id) }}" method="POST" style="display:inline;">
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Modelos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Lista de Modelos</h1>
        <a href="{{ route('modelo.create') }}" class="btn btn-primary mb-3">Adicionar Novo Modelo</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modelos as $modelo)
                    <tr>
                        <td>{{ $modelo->id }}</td>
                        <td>{{ $modelo->name }}</td>
                        <td>{{ $modelo->marca->nome }}</td> <!-- Exibindo o nome da marca associada -->
                        <td>
                            <a href="{{ route('modelo.edit', $modelo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('modelo.destroy', $modelo->id) }}" method="POST" style="display:inline;">
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

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Marca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Marca</h1>
        <div class="card p-4">
            <form action="{{ route('marca.update', $marca->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome da Marca</label>
                    <input type="text" name="nome" class="form-control" id="nome" value="{{ $marca->nome }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('marca.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>

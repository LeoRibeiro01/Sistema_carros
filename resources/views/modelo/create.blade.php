<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Novo Modelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Adicionar Novo Modelo</h1>
        <div class="card p-4">
            <form action="{{ route('modelo.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Modelo</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome do modelo" required>
                </div>
                <div class="mb-3">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select name="marca_id" class="form-control" id="marca_id" required>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}">{{ $marca->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('modelo.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</body>
</html>

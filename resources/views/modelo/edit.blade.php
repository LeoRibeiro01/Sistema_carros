<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Modelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Modelo</h1>
        <div class="card p-4">
            <form action="{{ route('modelo.update', $modelo->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nome do Modelo</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $modelo->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="marca_id" class="form-label">Marca</label>
                    <select name="marca_id" class="form-control" id="marca_id" required>
                        @foreach($marcas as $marca)
                            <option value="{{ $marca->id }}" {{ $modelo->marca_id == $marca->id ? 'selected' : '' }}>
                                {{ $marca->nome }}
                            </option>
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

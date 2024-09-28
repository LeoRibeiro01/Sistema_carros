<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Modelo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detalhes do Modelo</h1>
        <div class="card p-4">
            <p><strong>ID:</strong> {{ $modelo->id }}</p>
            <p><strong>Nome:</strong> {{ $modelo->name }}</p>
            <p><strong>Marca:</strong> {{ $modelo->marca->nome }}</p>
            <a href="{{ route('modelo.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
</body>
</html>

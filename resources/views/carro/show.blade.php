<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Detalhes do Carro</h1>
        <div class="mb-3">
            <strong>ID:</strong> {{ $carro->id }}
        </div>
        <div class="mb-3">
            <strong>Placa:</strong> {{ $carro->placa }}
        </div>
        <div class="mb-3">
            <strong>Modelo:</strong> {{ $carro->modelo->nome }}
        </div>
        <div class="mb-3">
            <strong>Cor:</strong> {{ $carro->cor->nome }}
        </div>
        <div class="mb-3">
            <strong>Estado:</strong> {{ $carro->estado->nome }}
        </div>
        <a href="{{ route('carro.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</body>
</html>

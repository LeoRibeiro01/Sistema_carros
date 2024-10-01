<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        h1 {
            color: #007BFF;
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
        }

        .form-control, .form-select {
            margin-bottom: 15px;
        }

        button {
            width: 100%;
        }

        .btn-secondary {
            margin-top: 10px;
        }

        .text-danger {
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Adicionar Novo Carro</h1>
        <form action="{{ route('carro.store') }}" method="POST">
            @csrf

            <!-- Campo de Placa -->
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="Digite a placa do carro" required>
                @error('placa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Modelo -->
            <div class="mb-3">
                <label for="modelo_id" class="form-label">Modelo</label>
                <select class="form-select" id="modelo_id" name="modelo_id" required>
                    <option value="" selected disabled>Selecione um Modelo</option>
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}">{{ $modelo->name }}: {{ $modelo->marca->nome }}</option>
                    @endforeach
                </select>
                @error('modelo_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Cor -->
            <div class="mb-3">
                <label for="cor_id" class="form-label">Cor</label>
                <select class="form-select" id="cor_id" name="cor_id" required>
                    <option value="" selected disabled>Selecione uma Cor</option>
                    @foreach($cors as $cor)
                        <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                    @endforeach
                </select>
                @error('cor_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Campo de Estado -->
            <div class="mb-3">
                <label for="estado_id" class="form-label">Estado</label>
                <select class="form-select" id="estado_id" name="estado_id" required>
                    <option value="" selected disabled>Selecione um Estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                    @endforeach
                </select>
                @error('estado_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-primary">Adicionar Carro</button>
            <a href="{{ route('carro.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>

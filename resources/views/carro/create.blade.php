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
            </div>
            aluno@lab0304:~/LeoDW/Sistema_carros$ git config --local user.email "leonardo.ribeiro250307@gmail.com"
            aluno@lab0304:~/LeoDW/Sistema_carros$ git config --local user.email "leonardo.ribeiro250307@gmail.com"l">Estado</label>
                <select class="form-select" id="estado_id" name="estado_id" required>
                    <option value="" selected disabled>Selecione um Estado</option>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}">{{ $estado->nome }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Botões -->
            <button type="submit" class="btn btn-primary">Adicionar Carro</button>
            <a href="{{ route('carro.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Editar Carro</h1>
        <form action="{{ route('carro.update', $carro->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" value="{{ $carro->placa }}" required>
                @error('placa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="modelo_id" class="form-label">Modelo</label>
                <select class="form-select" id="modelo_id" name="modelo_id" required>
                    @foreach($modelos as $modelo)
                        <option value="{{ $modelo->id }}" {{ $carro->modelo_id == $modelo->id ? 'selected' : '' }}>{{ $modelo->name }}</option>
                    @endforeach
                </select>
                @error('modelo_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cor_id" class="form-label">Cor</label>
                <select class="form-select" id="cor_id" name="cor_id" required>
                    @foreach($cors as $cor)
                        <option value="{{ $cor->id }}" {{ $carro->cor_id == $cor->id ? 'selected' : '' }}>{{ $cor->nome }}</option>
                    @endforeach
                </select>
                @error('cor_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="estado_id" class="form-label">Estado</label>
                <select class="form-select" id="estado_id" name="estado_id" required>
                    @foreach($estados as $estado)
                        <option value="{{ $estado->id }}" {{ $carro->estado_id == $estado->id ? 'selected' : '' }}>{{ $estado->nome }}</option>
                    @endforeach
                </select>
                @error('estado_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Atualizar Carro</button>
            <a href="{{ route('carro.index') }}" class="btn btn-secondary">Voltar</a>
        </form>
    </div>
</body>
</html>

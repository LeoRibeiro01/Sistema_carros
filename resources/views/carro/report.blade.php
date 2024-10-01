<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Carros Registrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; /* Font mais clean */
            margin: 20px;
            color: #333; /* Cor de texto mais neutra */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px; /* Tamanho da fonte ajustado */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff; /* Fundo branco para a tabela */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra leve */
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd; /* Borda leve */
        }
        th {
            background-color: #f2f2f2; /* Fundo leve para o cabeçalho */
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Linhas alternadas com fundo leve */
        }
        tr:hover {
            background-color: #f1f1f1; /* Efeito de hover */
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px; /* Fonte menor para o rodapé */
            color: #777; /* Cor de texto do rodapé */
        }
    </style>
</head>
<body>
    <h1>Relatório de Carros Registrados</h1>
    <table>
        <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Cor</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td>{{ $carro->placa }}</td>
                    <td>{{ $carro->modelo->marca->nome ?? 'N/A' }}</td>
                    <td>{{ $carro->modelo->name }}</td>
                    <td>{{ $carro->cor->nome }}</td>
                    <td>{{ $carro->estado->nome }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        © {{ date('Y') }} - Relatório de Veículos
    </footer>
</body>
</html>

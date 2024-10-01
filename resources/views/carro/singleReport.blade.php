<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Carro - {{ $carro->placa }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif; /* Fonte clean */
            margin: 20px;
            color: #333; /* Cor de texto neutra */
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
            background-color: #fff; /* Fundo branco */
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Sombra leve */
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd; /* Borda leve */
        }
        th {
            background-color: #f2f2f2; /* Fundo leve para cabeçalho */
            font-weight: bold;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px; /* Fonte menor para o rodapé */
            color: #777; /* Cor do rodapé */
        }
    </style>
</head>
<body>
    <h1>Relatório do Carro - {{ $carro->placa }}</h1>
    <table>
        <thead>
            <tr>
                <th>Informação</th>
                <th>Detalhe</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Placa</td>
                <td>{{ $carro->placa }}</td>
            </tr>
            <tr>
                <td>Marca</td>
                <td>{{ $carro->modelo->marca->nome ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Modelo</td>
                <td>{{ $carro->modelo->name }}</td>
            </tr>
            <tr>
                <td>Cor</td>
                <td>{{ $carro->cor->nome }}</td>
            </tr>
            <tr>
                <td>Estado</td>
                <td>{{ $carro->estado->nome }}</td>
            </tr>
        </tbody>
    </table>
    <footer>
        © {{ date('Y') }} - Relatório de Veículo
    </footer>
</body>
</html>

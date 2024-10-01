<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
        body {
            background-color: #f4f4f9;
            padding-top: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007BFF;
        }

        .chart-container {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Estatísticas de Carros</h2>

        <div class="row">
            <div class="col-md-6 chart-container">
                <div id="barra" style="width: 100%; height: 280px;"></div>
            </div>
            <div class="col-md-6 chart-container">
                <div id="pizza_cor" style="width: 100%; height: 280px;"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 chart-container">
                <div id="pizza_modelo" style="width: 100%; height: 280px;"></div>
            </div>
            <div class="col-md-6 chart-container">
                <div id="coluna" style="width: 100%; height: 280px;"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var data_graph = <?php echo $data ?>;

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Gráfico de Barras - Total de Modelos por Marcas
            let dataBarras = google.visualization.arrayToDataTable(data_graph['modelos_por_marcas']);
            let optionsBarras = {
                title: 'Total de Modelos por Marcas',
                colors: ['#198754'],
                legend: 'none',
                hAxis: {
                    title: 'Marcas',
                    titleTextStyle: { fontSize: 12, bold: true }
                },
                vAxis: { title: 'Número de Modelos' }
            };
            let chartBarras = new google.visualization.BarChart(document.getElementById('barra'));
            chartBarras.draw(dataBarras, optionsBarras);

            // Gráfico de Pizza 3D - Total de Carros por Cor
            let dataPizzaCor = google.visualization.arrayToDataTable(data_graph['carros_por_cor']);
            let optionsPizzaCor = { title: 'Total de Carros por Cor', is3D: true };
            let chartPizzaCor = new google.visualization.PieChart(document.getElementById('pizza_cor'));
            chartPizzaCor.draw(dataPizzaCor, optionsPizzaCor);

            // Gráfico de Pizza 3D - Total de Carros por Modelo
            let dataPizzaModelo = google.visualization.arrayToDataTable(data_graph['carros_por_modelo']);
            let optionsPizzaModelo = { title: 'Total de Carros por Modelo', is3D: true };
            let chartPizzaModelo = new google.visualization.PieChart(document.getElementById('pizza_modelo'));
            chartPizzaModelo.draw(dataPizzaModelo, optionsPizzaModelo);

            // Gráfico de Colunas - Total de Carros por Estado
            let dataColunas = google.visualization.arrayToDataTable(data_graph['carros_por_estado']);
            let optionsColunas = {
                title: 'Total de Carros por Estado',
                colors: ['#198754'],
                legend: 'none',
                hAxis: { title: 'Estados' },
                vAxis: {
                    title: 'Número de Carros',
                    titleTextStyle: { fontSize: 12, bold: true }
                }
            };
            let chartColunas = new google.visualization.ColumnChart(document.getElementById('coluna'));
            chartColunas.draw(dataColunas, optionsColunas);
        }
    </script>

</body>
</html>

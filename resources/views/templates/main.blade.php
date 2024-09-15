<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Sistema de Gestão de Carros</title>
    <style>
        body {
            background-image: url('https://example.com/car-background.jpg'); /* Adicione uma URL válida para uma imagem de fundo */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #fff;
        }
        .navbar {
            background-color: #001f3f; /* Azul marinho */
        }
        .navbar-brand, .nav-link {
            color: white;
        }
        .navbar-brand:hover, .nav-link:hover {
            color: #d3d3d3;
        }
        .hero-section {
            background: rgba(0, 0, 0, 0.6); /* Fundo escuro translúcido */
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }
        .cards-section {
            margin: 50px 0;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9); /* Fundo branco com transparência */
        }
        .card-title {
            color: #001f3f;
        }
        .container {
            max-width: 1200px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-house-add-fill" viewBox="0 0 16 16">
                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 1 1-1 0v-1h-1a.5.5 0 1 1 0-1h1v-1a.5.5 0 0 1 1 0"/>
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
                    <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z"/>
                </svg>
                Sistema Carros
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carro.index') }}">Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cor.index') }}">Cores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('marca.index') }}">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('modelo.index') }}">Modelos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <div class="container">
            <h1>Sistema de Gestão de Carros</h1>
            <p>Gerencie seus carros, marcas, modelos e cores com facilidade e eficiência.</p>
            <a href="{{ route('carro.index') }}" class="btn btn-primary btn-lg">Ver Carros</a>
        </div>
    </div>

    <div class="container cards-section">
        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Carros</h5>
                        <p class="card-text">Gerencie todos os veículos cadastrados no sistema.</p>
                        <a href="{{ route('carro.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Cores</h5>
                        <p class="card-text">Gerencie as diferentes cores de veículos disponíveis.</p>
                        <a href="{{ route('cor.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Marcas</h5>
                        <p class="card-text">Gerencie as marcas de veículos cadastradas.</p>
                        <a href="{{ route('marca.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Modelos</h5>
                        <p class="card-text">Gerencie os diferentes modelos de veículos.</p>
                        <a href="{{ route('modelo.index') }}" class="btn btn-primary">Acessar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

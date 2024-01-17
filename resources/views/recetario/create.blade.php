<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Crear Recetario</title>

    <style>
        body {
            background: url('{{ asset('image/1.jpg') }}') no-repeat center center fixed; 
            background-size: cover;
        }

        .menu {
            background-color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark menu">
        <div class="container">
            <a class="navbar-brand" href="/animal">Mi Sitio Web</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('historia.create') }}">Registrar Historia</a>
                    </li>
                    <!-- Add other navigation links here if needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <h1>Crear Nuevo Recetario</h1>
        <form action="{{ route('recetario.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="historia_id" class="form-label">Seleccione una Historia</label>
                <select class="form-select" id="historia_id" name="historia_id">
                    @foreach($historias as $historia)
                        <option value="{{ $historia->id }}">{{ $historia->id }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Add other form fields here if needed -->
            <button type="submit" class="btn btn-primary">Crear Recetario</button>
        </form>
    </div>
</body>
</html>

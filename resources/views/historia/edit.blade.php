<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Editar Historia</title>

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
                        <a class="nav-link" href="{{ route('historia.index') }}">Ver Historias</a>
                    </li>
                    <!-- Add other navigation links here if needed -->
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <h1>Editar Historia</h1>
        <form action="{{ route('historia.update', $historia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fechaElaboracion" class="form-label">Fecha de Elaboración</label>
                <input type="date" class="form-control" id="fechaElaboracion" name="fechaElaboracion" value="{{ $historia->fechaElaboracion }}">
            </div>
            <div class="mb-3">
                <label for="hora" class="form-label">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" value="{{ $historia->hora }}">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $historia->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="diagnostico" class="form-label">Diagnóstico</label>
                <input type="text" class="form-control" id="diagnostico" name="diagnostico" value="{{ $historia->diagnostico }}">
            </div>
            <div class="mb-3">
                <label for="tratamiento" class="form-label">Tratamiento</label>
                <input type="text" class="form-control" id="tratamiento" name="tratamiento" value="{{ $historia->tratamiento }}">
            </div>
            <div class="mb-3">
                <label for="paciente_id" class="form-label">Seleccione un Paciente</label>
                <select class="form-select" id="paciente_id" name="paciente_id">
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ $historia->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="usuario_id" class="form-label">Seleccione un Usuario</label>
                <select class="form-select" id="usuario_id" name="usuario_id">
                    @foreach($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $historia->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Other fields if needed -->

            <button type="submit" class="btn btn-primary">Actualizar Historia</button>
        </form>
    </div>
</body>
</html>

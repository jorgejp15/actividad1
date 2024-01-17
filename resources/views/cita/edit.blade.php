<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Editar Cita</title>

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
      <a class="navbar-brand" href="#">Mi Sitio Web</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('cita.index') }}">Ver Citas</a>
          </li>
          <!-- Add other navigation links here if needed -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container my-5">
    <h1>Editar Cita</h1>
    <form action="{{ route('cita.update', $cita->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $cita->fecha }}">
      </div>
      <div class="mb-3">
        <label for="hora" class="form-label">Hora</label>
        <input type="time" class="form-control" id="hora" name="hora" value="{{ $cita->hora }}">
      </div>
      <div class="mb-3">
        <label for="motivoConsulta" class="form-label">Motivo de Consulta</label>
        <textarea class="form-control" id="motivoConsulta" name="motivoConsulta" rows="3">{{ $cita->motivoConsulta }}</textarea>
      </div>
      <div class="mb-3">
        <label for="paciente_id" class="form-label">Seleccione un Paciente</label>
        <select class="form-select" id="paciente_id" name="paciente_id">
          @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}" {{ $cita->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="usuario_id" class="form-label">Seleccione un Usuario</label>
        <select class="form-select" id="usuario_id" name="usuario_id">
          @foreach($usuarios as $usuario)
            <option value="{{ $usuario->id }}" {{ $cita->usuario_id == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre }}</option>
          @endforeach
        </select>
      </div>
      <!-- Add other form fields here if needed -->
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  </div>
</body>
</html>

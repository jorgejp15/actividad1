<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Historias</title>

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
      <a class="navbar-brand" href="/">Mi Sitio Web</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="/" >Inicio</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('historia.create') }}">Registrar Historia</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/paciente">Pacientes</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/cita">Citas</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/usuario">Usuario</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/rol_usuario">Rol Usuario</a>
          </li>
          
          <li class="nav-item">
             <a class="nav-link" href="/recetario">Recetario</a>
          </li>
          <!-- Add other navigation links here if needed -->
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container my-5">
    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Fecha de Elaboración</th>
          <th>Hora</th>
          <th>Descripción</th>
          <th>Diagnóstico</th>
          <th>Tratamiento</th>
          <th>Paciente</th>
          <th>Usuario</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($historias as $historia)
        <tr>
          <td>{{ $historia->id }}</td>
          <td>{{ $historia->fechaElaboracion }}</td>
          <td>{{ $historia->hora }}</td>
          <td>{{ $historia->descripcion }}</td>
          <td>{{ $historia->diagnostico }}</td>
          <td>{{ $historia->tratamiento }}</td>
          <td>{{ $historia->paciente->nombre }}</td>
          <td>{{ $historia->usuario->nombre }}</td>
          <td>
            <a href="{{ route('historia.edit', $historia->id) }}">Editar</a>
            <form action="{{ route('historia.destroy', $historia->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Estudiante</title>

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
             <a class="nav-link" href="/estudiante/create">Registrar Estudiante</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/grado">Grados</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/carrera">Carrera</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/docente_grado">Docente_grado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/docente">Docente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/persona">Persona</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/matricula">Matricula</a>
          </li>
        
        </ul>
      </div>

    </div>
  </nav>
  <div class="container my-5">

<table class="table table-bordered table-striped table-hover">
  <thead class="table-dark">
    <tr>
      <th>ID</th>
      <th>Descripcion</th>
      <th>nombre Persona</th>
      <th>
      <a href="{{ route('estudiante.create') }}" class="btn btn-primary">Crear</a>
      </th>

    

    </tr>
  </thead>

  <tbody>
  @foreach ($estudiantes as $estudiante)        
    <tr>
        <th>{{ $estudiante->id }}</th>
        <td>{{ $estudiante->descripcion }}</td>
        <td>
            @php
                $persona = App\Models\Persona::find($estudiante->persona_id);
            @endphp
            @if ($persona)
                {{ $persona->nombre }}
            @else
                Persona no encontrada
            @endif
        </td>

        <td>
            <a href="{{ route('estudiante.edit', $estudiante->id) }}">Editar</a>
            <form action="{{ route('estudiante.destroy', $estudiante->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach
 

  </tbody>
</table>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Matricula</title>

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
             <a class="nav-link" href="/matricula/create">Registrar Matricula</a>
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
            <a class="nav-link" href="/estudiante">estudiante</a>
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
      <th>nombre de carrera </th>
      <th>Nombre de estudiante</th>
      <th>
      <a href="{{ route('matricula.create') }}" class="btn btn-primary">Crear</a>
      </th>

    

    </tr>
  </thead>

  <tbody>
  @foreach ($matriculas as $matricula)        
    <tr>
        <th>{{ $matricula->id }}</th>
        <td>{{ App\Models\Carrera::find($matricula->carrera_id)->nombre }}</td>
        <td>
            @php
                $estudiante = App\Models\Estudiante::find($matricula->estudiante_id);
            @endphp
            @if ($estudiante)
                {{ $estudiante->descripcion }}
            @else
                Estudiante no encontrado
            @endif
        </td>
        <td>
            <a href="{{ route('matricula.edit', $matricula->id) }}">Editar</a>
            <form action="{{ route('matricula.destroy', $matricula->id) }}" method="POST">
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
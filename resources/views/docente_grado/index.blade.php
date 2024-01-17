<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Docente_grado</title>

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
             <a class="nav-link" href="/docente_grado/create">Registrar docente_gradp</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/grado">Grados</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/grado">Carrera</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/matricula">matricula</a>
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
      <th>grado </th>
      <th>salario</th>
      <th>descripcion</th>   
      <th>
      <a href="{{ route('docente_grado.create') }}" class="btn btn-primary">Crear</a>
      </th>

    

    </tr>
  </thead>

  <tbody>
  @foreach ($docente_grados as $docente_grado)
    <tr>
        <th>{{ $docente_grado->id }}</th>
        <td>
            @if ($docente_grado->grado)
                {{ $docente_grado->grado->nombre ?? 'Nombre no disponible' }}
            @else
                Grado no encontrado
            @endif
        </td>
        <td>
            @if ($docente_grado->docente)
                {{ $docente_grado->docente->salario ?? 'Salario no disponible' }}
            @else
                Docente no encontrado
            @endif
        </td>
        <td>{{ $docente_grado->descripcion }}</td>
        <td>
            <a href="{{ route('docente_grado.edit', $docente_grado->id) }}">Editar</a>
            <form action="{{ route('docente_grado.destroy', $docente_grado->id) }}" method="POST">
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
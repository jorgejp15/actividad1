<!DOCTYPE html>
<html>
<head>
  <title>Formulario</title> 
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
    body {
      display: flex;
      align-items: center; 
      height: 100vh;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }
  </style>

</head>

<body>

 <!-- <form action="{{ url('/PersonaFormController') }}" method="POST"> -->
 <form  method="POST" action="{{ route('Personas.store') }}">
   @csrf
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
      <label for="apellido" class="form-label">Apellidos</label>
      <input type="text" class="form-control" id="apellidos" name="apellidos">
    </div>

    <div class="mb-3">
      <label class="form-label">Sexo</label>
      <select class="form-select" name="sexo">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        <option value="ND">No definido</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
      <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
    </div>

    <div class="mb-3">
      <label for="ci" class="form-label">Cédula</label> 
      <input type="number" class="form-control" id="ci" name="ci" minlength="8" maxlength="10">
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>

  </form>

</body>

</html>
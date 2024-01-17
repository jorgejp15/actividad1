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
 <form  method="POST" action="{{ route('zoo.store') }}">
   @csrf
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre </label>
      <input type="text" class="form-control" id="nombre" name="nombre">
    </div>

    <div class="mb-3">
      <label for="ciudad" class="form-label">Ciudad</label>
      <input type="text" class="form-control" id="ciudad" name="ciudad">
    </div>

    <div class="mb-3">
      <label for="pais" class="form-label">Pais</label>
      <input type="text" class="form-control" id="pais" name="pais">
    </div>
    <div class="mb-3">
      <label for="tamaño" class="form-label">Tamaño</label>
      <input type="text" class="form-control" id="tamaño" name="tamaño">
    </div>
    <div class="mb-3">
      <label for="presupuesto" class="form-label">Presupuesto</label>
      <input type="text" class="form-control" id="presupuesto" name="presupuesto">
    </div>


    <button type="submit" class="btn btn-primary">Enviar</button>

  </form>

</body>

</html>
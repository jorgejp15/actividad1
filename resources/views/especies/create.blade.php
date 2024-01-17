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
 <form  method="POST" action="{{ route('especie.store') }}">
   @csrf
    <div class="mb-3">
      <label for="nomcientifico" class="form-label">Nombre Cientifico</label>
      <input type="text" class="form-control" id="nomcientifico" name="nomcientifico">
    </div>

    <div class="mb-3">
      <label for="nomvulgar" class="form-label">Nombre</label>
      <input type="text" class="form-control" id="nomvulgar" name="nomvulgar">
    </div>

    <div class="mb-3">
      <label for="familia" class="form-label">Familia</label>
      <input type="text" class="form-control" id="familia" name="familia">
    </div>

    <div class="mb-3">
      <label for="peligro" class="form-label">Peligro</label>
      <input type="text" class="form-control" id="peligro" name="peligro">
    </div>


    <button type="submit" class="btn btn-primary">Enviar</button>

  </form>

</body>

</html>
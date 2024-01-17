<!DOCTYPE html>
<html>
<head>Editar Carrera</title> 
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
 <form action="{{ route('carrera.update',$carreras->id) }}"  method="POST" >
   @csrf
   @method('PUT')
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" value="{{$carreras->nombre}}">
    </div>
    <div class="mb-3">
      <label for="nombre" class="form-label">Descripcion</label>
      <input type="text" class="form-control" name="descripcion" value="{{$carreras->descripcion}}">
    </div>

   

    <button type="submit" class="btn btn-primary">Actualizar</button>

  </form>

</body>

</html>
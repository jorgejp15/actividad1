<!DOCTYPE html>
<html>
<head>
  <title>Editar grados</title> 
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

 <form action="{{ route('grado.update', $grados->id) }}"  method="POST" >
   @csrf
   @method('PUT')
    <div class="mb-3">
      <label for="nombre" class="form-label">Nombre</label>
      <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ $grados->nombre }}">
      @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
  </form>

</body>
</html>

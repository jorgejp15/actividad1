<!DOCTYPE html>
<html>
<head>
    <title>Crear Paciente</title>
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
    <form method="POST" action="{{ route('paciente.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
            @error('nombre')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
                <div class="mb-3">
            <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
            @error('sexo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fechaNacimineto" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fechaNacimineto" name="fechaNacimineto">
            @error('fechaNacimineto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" class="form-control" id="edad" name="edad">
            @error('edad')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idNum" class="form-label">ID Num</label>
            <input type="number" class="form-control" id="idNum" name="idNum">
            @error('idNum')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="aseguradora" class="form-label">Aseguradora</label>
            <input type="text" class="form-control" id="aseguradora" name="aseguradora">
            @error('aseguradora')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="domicilio" class="form-label">Domicilio</label>
            <input type="text" class="form-control" id="domicilio" name="domicilio">
            @error('domicilio')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
            @error('telefono')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="otros" class="form-label">Otros</label>
            <input type="text" class="form-control" id="otros" name="otros">
            @error('otros')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="text" class="form-control" id="foto" name="foto">
            @error('foto')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

         <div class="mb-3">
                <label for="Usuario_id" class="form-label">Usuario</label>
                <select class="form-select" id="Usuario_id" name="Usuario_id">
                @foreach($usuarios as $usuario)
                 <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                 @endforeach
                </select>
                @error('Usuario_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        


        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>

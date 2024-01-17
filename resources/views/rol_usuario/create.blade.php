<!DOCTYPE html>
<html>
<head>
    <title>Crear Rol de Usuario</title>
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
    <form method="POST" action="{{ route('rol_usuario.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombreRol" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" id="nombreRol" name="nombreRol">
            @error('nombreRol')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
                <div class="mb-3">
            <label for="Usuario_id" class="form-label">Seleccionar Usuario</label>
            <select class="form-select" name="Usuario_id" id="Usuario_id">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>

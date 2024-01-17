<!DOCTYPE html>
<html>
<head>
    <title>Editar Rol de Usuario</title>
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
    <form action="{{ route('rol_usuario.update', $rol->Usuario_id) }}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="nombreRol" class="form-label">Nombre del Rol</label>
            <input type="text" class="form-control" name="nombreRol" value="{{ $rol->nombreRol }}">
        </div>
        <!-- Add other fields here if needed -->

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>

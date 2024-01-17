<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
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
    <form action="{{ route('docente.update', $docentes->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="persona_id" class="form-label">Ci_Persona</label>
            <select class="form-select" name="persona_id">
                @foreach($personas as $persona)
                    <option value="{{ $persona->id }}">{{ $persona->ci }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="salario" class="form-label">Salario</label>
            <input type="text" class="form-control @error('salario') is-invalid @enderror" id="salario" name="salario" value="{{ old('salario', $docentes->salario) }}">
            @error('salario')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_de_ingreso" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control @error('fecha_de_ingreso') is-invalid @enderror" id="fecha_de_ingreso" name="fecha_de_ingreso" value="{{ old('fecha_de_ingreso', $docentes->fecha_de_ingreso) }}">
            @error('fecha_de_ingreso')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</body>
</html>

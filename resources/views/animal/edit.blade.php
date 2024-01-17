<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Animal</title>
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

    <form action="{{ route('animal.update', $animals->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="zoo_id" class="form-label">Zoológico</label>
            <select class="form-select" name="zoo_id">
                @foreach($zoos as $zoo)
                    <option value="{{ $zoo->id }}" {{ $zoo->id == $animals->zoo_id ? 'selected' : '' }}>{{ $zoo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="especie_id" class="form-label">Especie</label>
            <select class="form-select" name="especie_id">
                @foreach($especies as $especie)
                    <option value="{{ $especie->id }}" {{ $especie->id == $animals->especie_id ? 'selected' : '' }}>{{ $especie->nomvulgar }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sexo" class="form-label">Sexo (M/F)</label>
            <select class="form-select" name="sexo">
                <option value="M" {{ $animals->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
                <option value="F" {{ $animals->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="añonacim" class="form-label">Año de Nacimiento</label>
            <input type="date" class="form-control" name="añonacim" value="{{ $animals->añonacim }}">
        </div>

        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" name="pais" value="{{ $animals->pais }}">
        </div>

        <div class="mb-3">
            <label for="continente" class="form-label">Continente</label>
            <input type="text" class="form-control" name="continente" value="{{ $animals->continente }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

</body>
</html>

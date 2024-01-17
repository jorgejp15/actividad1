<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Animal</title>
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

    <form method="POST" action="{{ route('animal.store') }}">
        @csrf

        <div class="mb-3">
            <label for="zoo_id" class="form-label">Zoológico</label>
            <select class="form-select" id="zoo_id" name="zoo_id">
                @foreach($zoos as $zoos)
                    <option value="{{ $zoos->id }}">{{ $zoos->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="especie_id" class="form-label">Especie</label>
            <select class="form-select" id="especie_id" name="especie_id">
                @foreach($especies as $especies)
                    <option value="{{ $especies->id }}">{{ $especies->nomvulgar }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
          <label for="sexo" class="form-label">Sexo</label>
            <select class="form-select" id="sexo" name="sexo">
             <option value="M">Masculino</option>
             <option value="F">Femenino</option>
          </select>
        </div>


        <div class="mb-3">
            <label for="añonacim" class="form-label">Año de Nacimiento</label>
            <input type="date" class="form-control" id="añonacim" name="añonacim">
        </div>


        <div class="mb-3">
            <label for="pais" class="form-label">País</label>
            <input type="text" class="form-control" id="pais" name="pais">
        </div>

        <div class="mb-3">
            <label for="continente" class="form-label">Continente</label>
            <input type="text" class="form-control" id="continente" name="continente">
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricula</title>
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

        <form method="POST" action="{{ route('docente_grado.store') }}">
            @csrf


       

        <div class="mb-3">
            <label for="grado_id" class="form-label">grado</label>
            <select class="form-select" id="grado_id" name="grado_id">
                @foreach($grados as $grados)
                    <option value="{{ $grados->id }}">{{ $grados->nombre }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-3">
            <label for="docente_id" class="form-label">salario</label>
            <select class="form-select" id="docente_id" name="docente_id">
                @foreach($docentes as $docente)
                    <option value="{{ $docente->id }}">{{ $docente->salario }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion">
            @error('descripcion')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        


        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>




        

</body>
</html>
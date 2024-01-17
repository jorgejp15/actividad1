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

        <form method="POST" action="{{ route('matricula.store') }}">
            @csrf


       

        <div class="mb-3">
            <label for="carrera_id" class="form-label">Carrera</label>
            <select class="form-select" id="carrera_id" name="carrera_id">
                @foreach($carreras as $carreras)
                    <option value="{{ $carreras->id }}">{{ $carreras->nombre }}</option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-3">
            <label for="estudiante_id" class="form-label">Estudiante</label>
            <select class="form-select" id="carrera_id" name="estudiante_id">
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}">{{ $estudiante->descripcion }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
        </form>




        

</body>
</html>

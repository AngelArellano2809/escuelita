<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo alumno</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/alumnos" method="POST">
        @csrf
        <h1>Nuevo Alumno</h1>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        <br>
        <label for="correo">Correo</label>
        <input type="email" name="correo" value="{{ old('correo') }}">
        <br>
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="text" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
        <br>
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" value="{{ old('ciudad') }}">
        <br>
        <button type="submit">
            Enviar
        </button>
    </form>
</body>
</html>
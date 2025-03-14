<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
</head>
<body>
    <h1>Editar alumno # {{ $alumno->id }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('alumnos.update', $alumno) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ $alumno->nombre }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="correo">Correo</label>
        <input type="email" name="correo" value="{{ $alumno->correo }}">
        @error('correo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="text" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}">
        @error('mensaje')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" value="{{ $alumno->ciudad }}">
        @error('nombre')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <button type="submit">
            Enviar
        </button>
    </form>
</body>
</html>
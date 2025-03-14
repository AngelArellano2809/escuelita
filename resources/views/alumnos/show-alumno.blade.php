<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Alumno # {{ $alumno->id }}</h1>

    <ul>
        <li>Nombre: {{ $alumno->nombre }}</li>
        <li>Correo: {{ $alumno->correo }}</li>
        <li>Fecha de nacimiento: {{ $alumno->fecha_nacimiento }}</li>
        <li>Ciudad: {{ $alumno->ciudad }}</li>
    </ul>
    <p>
    alumno: <br>
        {{ $alumno->alumno }}
    </p>
    <hr>
    <a href="{{ route('alumnos.edit', $alumno) }}">Editar</a>

    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar</button>
    </form>

    <a href="{{ route('alumnos.index', $alumno) }}">Regresar</a>

</body>
</html>
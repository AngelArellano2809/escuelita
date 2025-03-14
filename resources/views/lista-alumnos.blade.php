<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Alumnos</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Fecha de nacimiento</th>
            <th>ciudad</th>
            <th>Creado</th>
            <th>Acciones</th>
        </tr>

        @foreach ($alumnos as $alumno)
            <tr>
                <td>
                    <a href="{{ route('alumnos.show', $alumno->id) }}">{{ $alumno->id }}</a>
                </td>
                <td>{{ $alumno->nombre }}</td>
                <td>{{ $alumno->correo }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->ciudad }}</td>
                <td>{{ $alumno->created_at }}</td>
                <td>
                    <a href="{{ route('alumnos.edit', $alumno) }}">Editar</a>
                    <a href="{{ route('alumnos.show', $alumno) }}">Ver</a>
                    <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
    <a href="{{ route('alumnos.create') }}">Nuevo</a>
</body>
</html>
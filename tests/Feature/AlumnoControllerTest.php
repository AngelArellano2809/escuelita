<?php

use App\Models\Alumno;

test('muestra-listado-alumnos', function () {
    $response = $this->get('/alumnos');
    $response->assertSee('Lista de Alumnos');

    $response->assertStatus(200);
});

test('muestra-formulario-crear-alumno', function () {
    $response = $this->get('/alumnos/create');
    $response->assertSee('Nuevo Alumno')
        ->assertSeeHtml('name="nombre"', false);

    $response->assertStatus(200);
});

test('muestra-formulario-editar-alumno', function () {
    $alumno = Alumno::factory()->create();

    $response = $this->get(route('alumnos.edit', $alumno->id));

    $response->assertSee('Editar alumno', $alumno->id)
        ->assertSeeHtml($alumno->nombre)
        ->assertSeeHtml($alumno->correo)
        ->assertSeeHtml($alumno->fecha_nacimiento)
        ->assertSeeHtml($alumno->ciudad)
        ->assertStatus(200);
});

test('muestra-detalles-alumno', function () {
    $alumno = Alumno::factory()->create();

    $response = $this->get(route('alumnos.show', $alumno->id));

    $response->assertSee('Alumno # ', $alumno->id)
        ->assertSeeHtml($alumno->nombre)
        ->assertSeeHtml($alumno->correo)
        ->assertSeeHtml($alumno->fecha_nacimiento)
        ->assertSeeHtml($alumno->ciudad)
        ->assertStatus(200);
});

test('crear-alumno', function () {
    $alumno = Alumno::factory()->make();

    $response = $this->post('/alumnos', $alumno->toArray());

    $this->assertDatabaseHas('alumnos', $alumno->toArray());
    $response->assertRedirect('/alumnos');
});

test('editar-alumno', function () {
    $alumno = Alumno::factory()->create();

    $nuevosDatos = [
        'nombre' => 'Test',
        'correo' => 'Test@example.com',
        'fecha_nacimiento' => '28/09/2002',
        'ciudad' => 'Guadalajara',
    ];

    $response = $this->put('/alumnos/' . $alumno->id, $nuevosDatos);

    $this->assertDatabaseHas('alumnos', [
        'nombre' => 'Test',
        'correo' => 'Test@example.com',
        'fecha_nacimiento' => '28/09/2002',
        'ciudad' => 'Guadalajara',
    ]);

    $response->assertRedirect('/alumnos/' . $alumno->id);

    $alumno->delete();
});

test('eliminar-alumno', function () {
    $alumno = Alumno::factory()->create();

    $response = $this->delete('/alumnos/' . $alumno->id);

    $this->assertDatabaseMissing('alumnos', ['id' => $alumno->id,]);
    $response->assertRedirect('/alumnos');
});

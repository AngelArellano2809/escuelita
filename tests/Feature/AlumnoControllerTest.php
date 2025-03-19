<?php

test('Titulo-principal', function () {
    $response = $this->get('/alumnos');
    $response->assertSee('Lista de Alumnos');

    $response->assertStatus(200);
});

test('muestra-formulario-crear-alumno', function () {
    $response = $this->get('/alumnos/create');
    $response->assertSee('Nuevo Alumno');
    //    ->assertSeeHtml('nombre="nombre"');

    $response->assertStatus(200);
});

test('muestra-formulario-editar-alumno', function () {
    $response = $this->get('/alumnos/#/edit'); //
    $response->assertSee('Editar alumno');
    //    ->assertSeeHtml('nombre="nombre"');

    $response->assertStatus(200);
});

test('muestra-detalles-alumno', function () {
    $response = $this->get('/alumnos/#'); //
    $response->assertSee('Alumno');
    //    ->assertSeeHtml('nombre="nombre"');

    $response->assertStatus(200);
});

test('crear-alumno', function () {
    $response = $this->post('/alumnos/create', [
        'nombre' => 'Test',
        'correo' => 'test@mail.com',
        'fecha_nacimiento' => '00/00/0000',
        'ciudad' => 'Guadalajara',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/alumnos');
});

test('editar-alumno', function () {
    $response = $this->post('/alumnos', [
        'nombre' => 'Test',
        'correo' => 'test@mail.com',
        'fecha_nacimiento' => '00/00/0000',
        'ciudad' => 'Guadalajara',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/alumnos');
});

test('eliminar-alumno', function () {
    $response = $this->post('/alumnos', [
        'nombre' => 'Test',
        'correo' => 'test@mail.com',
        'fecha_nacimiento' => '00/00/0000',
        'ciudad' => 'Guadalajara',
    ]);

    $response->assertStatus(302);
    $response->assertRedirect('/alumnos');
});
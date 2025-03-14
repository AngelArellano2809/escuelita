<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('lista-alumnos', [
            'alumnos' => alumno::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'fecha_nacimiento' => 'required|min:3|max:255',
            'ciudad' => 'required|min:3|max:255',
        ]);
    
        $alumno = new Alumno();
        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->ciudad = $request->ciudad;
        $alumno->save();

        return redirect('/alumnos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show-alumno', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos.edit-alumno', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'fecha_nacimiento' => 'required|min:3|max:255',
            'ciudad' => 'required|min:3|max:255',
        ]);

        $alumno->nombre = $request->nombre;
        $alumno->correo = $request->correo;
        $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        $alumno->ciudad = $request->ciudad;
        $alumno->save();

        return redirect()->route('alumnos.show', $alumno);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index');
    }
}

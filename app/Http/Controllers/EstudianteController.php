<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $estudiantes =  Estudiante::all();
       return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|min:5|max:100|regex:/^[a-zA-Z\s]+$/',
            'curso' => 'required|string|min:5|max:100|regex:/^[a-zA-Z\s]+$/',
        ]
        );

        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|min:5|max:100|regex:/^[a-zA-Z\s]+$/',
            'curso' => 'required|string|min:5|max:100|regex:/^[a-zA-Z\s]+$/',
        ], [
            'nombre.regex' => 'Error',
            'curso.regex' => 'Error',
        ]
        );
       

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $estudiante = Estudiante::findOrFail($id);
      $estudiante->delete();
      return redirect()->route('estudiantes.index');
    }
}

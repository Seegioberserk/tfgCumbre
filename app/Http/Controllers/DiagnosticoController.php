<?php

namespace App\Http\Controllers;

use App\Models\Diagnostico;
use App\Models\Servicio;
use Illuminate\Http\Request;

class DiagnosticoController extends Controller
{
    // Mostrar todos los diagnósticos
    public function index()
    {
        $diagnosticos = Diagnostico::with('servicio')->get();
        return view('diagnosticos.index', compact('diagnosticos'));
    }

    // Mostrar formulario para crear un nuevo diagnóstico
    public function create()
    {
        $servicios = Servicio::all();
        return view('diagnosticos.crear', compact('servicios'));
    }

    // Guardar un nuevo diagnóstico en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
            'CostoEstimado' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'id_servicio' => 'required|exists:servicios,id',
        ]);

        Diagnostico::create($request->all());
        return redirect()->route('index.diagnostico')->with('success', 'Diagnóstico creado correctamente.');
    }

    // Mostrar formulario para editar un diagnóstico existente
    public function edit(Diagnostico $diagnostico)
    {
        $servicios = Servicio::all();
        return view('diagnosticos.editar', compact('diagnostico', 'servicios'));
    }

    // Actualizar un diagnóstico en la base de datos
    public function update(Request $request, Diagnostico $diagnostico)
    {
        $request->validate([
            'Descripcion' => 'required|string|max:255',
            'CostoEstimado' => 'required|numeric|min:0',
            'fecha' => 'required|date',
            'id_servicio' => 'required|exists:servicios,id',
        ]);

        $diagnostico->update($request->all());
        return redirect()->route('index.diagnostico')->with('success', 'Diagnóstico actualizado correctamente.');
    }

    // Eliminar un diagnóstico
    public function destroy(Diagnostico $diagnostico)
    {
        $diagnostico->delete();
        return redirect()->route('index.diagnostico')->with('success', 'Diagnóstico eliminado correctamente.');
    }
}

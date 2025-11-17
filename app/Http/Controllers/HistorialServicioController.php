<?php

namespace App\Http\Controllers;

use App\Models\HistorialServicio;
use Illuminate\Http\Request;

class HistorialServicioController extends Controller
{
    // Mostrar todos los registros
    public function index()
    {
        $historiales = HistorialServicio::with(['servicio', 'user'])->get();
        return view('historial_servicios.index', compact('historiales'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        $servicios = \App\Models\Servicio::all();
        $usuarios = \App\Models\User::all();
        return view('historial_servicios.create', compact('servicios', 'usuarios'));
    }

    // Guardar nuevo registro
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'Descripcion' => 'required|string|max:255',
            'id_servicio' => 'required|exists:servicios,id',
            'id_user' => 'required|exists:users,id',
        ]);

        HistorialServicio::create($request->all());

        return redirect()
            ->route('index.historial_servicio')
            ->with('success', 'Historial de servicio creado correctamente.');
    }

    // Mostrar formulario de edición
    public function edit($id)
    {
        $historial = HistorialServicio::findOrFail($id);
        $servicios = \App\Models\Servicio::all();
        $usuarios = \App\Models\User::all();

        return view('historial_servicios.edit', compact('historial', 'servicios', 'usuarios'));
    }

    // Actualizar registro
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'Descripcion' => 'required|string|max:255',
            'id_servicio' => 'required|exists:servicios,id',
            'id_user' => 'required|exists:users,id',
        ]);

        $historial = HistorialServicio::findOrFail($id);
        $historial->update($request->all());

        return redirect()
            ->route('index.historial_servicio')
            ->with('success', 'Historial de servicio actualizado correctamente.');
    }

    // Eliminar registro
    public function destroy($id)
    {
        $historial = HistorialServicio::findOrFail($id);
        $historial->delete();

        return redirect()
            ->route('index.historial_servicio')
            ->with('success', 'Historial de servicio eliminado correctamente.');
    }
}

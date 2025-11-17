<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class EquipoController extends Controller
{
    // Listar todos los equipos
    public function index()
    {
        $equipos = Equipo::with('cliente')->get();
        return view('equipo.index', compact('equipos'));
    }

    // Formulario para crear nuevo equipo
    public function create()
    {
        $clientes = Cliente::all();
        return view('equipo.crear', compact('clientes'));
    }

    // Guardar nuevo equipo
    public function store(Request $request)
    {
        $request->validate([
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string|max:255',
            'Serie' => 'required|string|max:255|unique:equipos,Serie',
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        Equipo::create($request->all());
        return redirect()->route('equipo.index')->with('success', 'Equipo creado correctamente.');
    }

    // Formulario para editar equipo
    public function edit(Equipo $equipo)
    {
        $clientes = Cliente::all();
        return view('equipo.editar', compact('equipo', 'clientes'));
    }

    // Actualizar equipo
    public function update(Request $request, Equipo $equipo)
    {
        $request->validate([
            'Marca' => 'required|string|max:255',
            'Modelo' => 'required|string|max:255',
            'Serie' => 'required|string|max:255|unique:equipos,Serie,' . $equipo->id,
            'id_cliente' => 'required|exists:clientes,id',
        ]);

        $equipo->update($request->all());
        return redirect()->route('equipo.index')->with('success', 'Equipo actualizado correctamente.');
    }

    // Eliminar equipo
    public function destroy(Equipo $equipo)
    {
        $equipo->delete();
        return redirect()->route('equipo.index')->with('success', 'Equipo eliminado correctamente.');
    }
}

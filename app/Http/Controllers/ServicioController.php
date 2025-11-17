<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Equipo;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with(['equipo', 'tipoServicio', 'usuario'])->get();
        return view('servicios.index', compact('servicios'));
    }

    public function create()
    {
        $equipos = Equipo::all();
        $tipos = TipoServicio::all();
        return view('servicios.crear', compact('equipos', 'tipos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'FechaIngreso' => 'required|date',
            'FechaEntrega' => 'required|date',
            'id_equipo' => 'required|exists:equipos,id',
            'id_tipo_servicio' => 'required|exists:tipo_servicios,id',
        ]);

        Servicio::create([
            'nombre' => $request->nombre,
            'FechaIngreso' => $request->FechaIngreso,
            'FechaEntrega' => $request->FechaEntrega,
            'id_equipo' => $request->id_equipo,
            'id_tipo_servicio' => $request->id_tipo_servicio,
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('index.servicio')->with('success', 'Servicio creado correctamente.');
    }

    public function edit(Servicio $servicio)
    {
        $equipos = Equipo::all();
        $tipos = TipoServicio::all();
        return view('servicios.editar', compact('servicio', 'equipos', 'tipos'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'FechaIngreso' => 'required|date',
            'FechaEntrega' => 'required|date',
            'id_equipo' => 'required|exists:equipos,id',
            'id_tipo_servicio' => 'required|exists:tipo_servicios,id',
        ]);

        $servicio->update($request->all());
        return redirect()->route('index.servicio')->with('success', 'Servicio actualizado correctamente.');
    }

    public function destroy(Servicio $servicio)
    {
        $servicio->delete();
        return redirect()->route('index.servicio')->with('success', 'Servicio eliminado correctamente.');
    }
}

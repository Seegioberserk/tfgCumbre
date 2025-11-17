<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $datos = Cliente::all();
        return view('cliente.index', compact('datos'));
    }

    public function create()
    {
        return view('cliente.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'direccion' => 'required|string|max:255',
            'ci' => 'required|string|max:50',
            'correo' => 'required|email|max:255',
        ]);

        Cliente::create($request->all());

        return redirect()->route('index.cliente')->with('success', 'Cliente agregado correctamente.');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.editar', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'direccion' => 'required|string|max:255',
            'ci' => 'required|string|max:50',
            'correo' => 'required|email|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('index.cliente')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route('index.cliente')->with('success', 'Cliente eliminado correctamente.');
    }
}

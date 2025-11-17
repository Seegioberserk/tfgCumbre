<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\User;
use App\Models\Diagnostico;
use App\Models\Producto;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with(['cliente', 'usuario', 'diagnostico', 'producto'])->latest()->paginate(10);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $usuarios = User::all();
        $diagnosticos = Diagnostico::all();
        $productos = Producto::all();
        

        return view('ventas.create', compact('clientes', 'usuarios', 'diagnosticos', 'productos',));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'Total' => 'required|numeric',
            'id_cliente' => 'required|exists:clientes,id',
            'id_user' => 'required|exists:users,id',
            'id_diagnostico' => 'required|exists:diagnosticos,id',
            'id_producto' => 'required|exists:productos,id',
        ]);

        Venta::create($request->all());
        return redirect()->route('venta.index')->with('success', 'Venta registrada correctamente.');
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);
        $clientes = Cliente::all();
        $usuarios = User::all();
        $diagnosticos = Diagnostico::all();
        $productos = Producto::all();

        return view('ventas.edit', compact('venta', 'clientes', 'usuarios', 'diagnosticos', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $venta = Venta::findOrFail($id);

        $request->validate([
            'fecha' => 'required|date',
            'Total' => 'required|numeric',
            'id_cliente' => 'required|exists:clientes,id',
            'id_user' => 'required|exists:users,id',
            'id_diagnostico' => 'required|exists:diagnosticos,id',
            'id_producto' => 'required|exists:productos,id',
        ]);

        $venta->update($request->all());
        return redirect()->route('venta.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();
        return redirect()->route('venta.index')->with('success', 'Venta eliminada correctamente.');
    }
}

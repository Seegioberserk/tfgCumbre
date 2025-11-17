<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        Producto::create($request->all());
        return redirect()->route('index.producto')->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'Descripcion' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $producto->update($request->all());
        return redirect()->route('index.producto')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('index.producto')->with('success', 'Producto eliminado correctamente.');
    }
}

@extends('layout.app')

@section('content')
<div class="row">
    {{-- Estilos --}}
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <div class="header-section d-flex justify-content-between align-items-center mb-4">
        <h1 style="color: #030303">Gestión de Productos</h1>
        <a class="btn-add" href="{{ route('index.crear.productos') }}">+ Nuevo Producto</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                <tr>
                    <td class="text-center">{{ $producto->id }}</td>
                    <td>{{ $producto->Nombre }}</td>
                    <td>{{ $producto->Descripcion }}</td>
                    <td>{{ number_format($producto->precio, 2) }} Bs</td>
                    <td>{{ $producto->categoria->Nombre ?? 'Sin categoría' }}</td>
                    <td class="text-center">
                        <a href="{{ route('editar.producto.form', $producto->id) }}" 
                           class="btn btn-sm btn-outline-primary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('eliminar.producto', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-outline-danger" 
                                    title="Eliminar"
                                    onclick="return confirm('¿Eliminar este producto?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No hay productos registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
.table-container {
    background: #fff;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
.btn {
    border: none;
    background: transparent;
    color: #6c757d;
    transition: 0.2s;
}
.btn:hover {
    color: #000;
    transform: scale(1.1);
}
.btn i { font-size: 1.2rem; }
.btn-add {
    background: #007bff;
    color: #fff !important;
    padding: 8px 15px;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
}
.btn-add:hover { background: #0056b3; }
</style>
@endsection

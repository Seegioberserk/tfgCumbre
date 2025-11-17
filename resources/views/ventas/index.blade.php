@extends('layout.app')

@section('content')
<div class="row">
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <div class="header-section d-flex justify-content-between align-items-center mb-4">
        <h1 style="color: #030303">Lista de Ventas</h1>
        <a class="btn-add" href="{{ route('venta.create') }}">+ Nueva Venta</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Cliente</th>
                    <th>Usuario</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ventas as $venta)
                <tr>
                    <td class="text-center">{{ $venta->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}</td>
                    <td>{{ number_format($venta->Total, 2) }} Bs</td>
                    <td>{{ $venta->cliente->name ?? '—' }}</td>
                    <td>{{ $venta->usuario->name ?? '—' }}</td>
                    <td>{{ $venta->producto->Nombre ?? '—' }}</td>
                    <td class="text-center">
                        <a href="{{ route('venta.edit', $venta->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('venta.destroy', $venta->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"
                                    onclick="return confirm('¿Eliminar esta venta?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No hay ventas registradas</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Paginación --}}
        <div class="pagination-container mt-3">
            {{ $ventas->links() }}
        </div>
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

.pagination-container {
    display: flex;
    justify-content: center;
}
</style>
@endsection

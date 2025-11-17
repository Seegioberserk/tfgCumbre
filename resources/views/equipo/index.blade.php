@extends('layout.app')

@section('content')
<div class="row">
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <div class="header-section d-flex justify-content-between align-items-center mb-4">
        <h1 style="color: #030303">Gestión de Equipos</h1>
        <a class="btn-add" href="{{ route('equipo.create') }}">+ Nuevo Equipo</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    <th>Cliente</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($equipos as $equipo)
                <tr>
                    <td class="text-center">{{ $equipo->id }}</td>
                    <td>{{ $equipo->Marca }}</td>
                    <td>{{ $equipo->Modelo }}</td>
                    <td>{{ $equipo->Serie }}</td>
                    <td>{{ $equipo->cliente->name ?? 'Sin cliente' }}</td>
                    <td class="text-center">
                        <a href="{{ route('equipo.edit', $equipo->id) }}" 
                           class="btn btn-sm btn-outline-primary" title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        <form action="{{ route('equipo.destroy', $equipo->id) }}" 
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-outline-danger" 
                                    title="Eliminar"
                                    onclick="return confirm('¿Eliminar este equipo?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No hay equipos registrados</td>
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

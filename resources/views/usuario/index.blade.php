@extends('layout.app')

@section('content')
<div class="row">
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <div class="header-section d-flex justify-content-between align-items-center mb-4">
        <h1 style="color: #030303">Gestión de Usuarios</h1>
        <a class="btn-add" href="{{ route('index.crear.usuario') }}">Agregar Usuario</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-container">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user as $user)
                    <tr>
                        <td class="text-center">{{ $dato->id }}</td>
                        <td>{{ $dato->name }}</td>
                        <td>{{ $dato->email }}</td>
                        <td>{{ $dato->rol->name ?? 'Sin rol' }}</td>
                        <td class="text-center">
                            @if ($dato->foto)
                                <img src="{{ asset('storage/' . $dato->foto) }}" 
                                     alt="Foto de {{ $dato->name }}"
                                     width="50" height="50"
                                     style="border-radius:50%; object-fit:cover;">
                            @else
                                <span class="text-muted">Sin foto</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Editar: usar GET -->
                            <a href="{{ route('index.editar.usuario', $dato->id) }}" 
                               class="btn btn-sm btn-outline-primary" 
                               title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            <!-- Eliminar: usar POST -->
                            <form action="{{ route('eliminar.usuario') }}" method="POST" style="display:inline-block;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $dato->id }}">
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar"
                                        onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted">No hay usuarios registrados.</td>
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

.btn i {
    font-size: 1.2rem;
}

.btn-add {
    background: #007bff;
    color: #fff !important;
    padding: 8px 15px;
    border-radius: 6px;
    text-decoration: none;
    transition: 0.3s;
}

.btn-add:hover {
    background: #0056b3;
}
</style>
@endsection

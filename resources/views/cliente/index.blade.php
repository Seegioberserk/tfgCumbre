@extends('layout.app')

@section('content')
<div class="row">
    {{-- Estilos generales --}}
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">
    {{-- Íconos de Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <div class="header-section d-flex justify-content-between align-items-center mb-4">
        <h1 style="color: #030303">Gestión de Clientes</h1>
        <a class="btn-add" href="{{ route('index.crear.cliente') }}">+ Nuevo Cliente</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Contenedor de la tabla --}}
    <div class="table-container">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>CI</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos as $cliente)
                <tr>
                    <td class="text-center">{{ $cliente->id }}</td>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>{{ $cliente->ci }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td class="text-center">

                        {{-- Botón Editar --}}
                        <a href="{{ route('cliente.edit', $cliente->id) }}" 
                           class="btn btn-sm btn-outline-primary" 
                           title="Editar">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        {{-- Botón Eliminar --}}
                        <form action="{{ route('cliente.destroy', $cliente->id) }}" 
                              method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="btn btn-sm btn-outline-danger" 
                                    title="Eliminar"
                                    onclick="return confirm('¿Eliminar cliente?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Estilos locales opcionales --}}
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

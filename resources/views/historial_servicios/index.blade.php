@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">
    
    <div class="header-section">
        <h1 style="color: #030303">Historial de Servicios</h1>
        <a class="btn-add" href="{{ route('crear.historial_servicio.form') }}">Nuevo Historial</a>
    </div>
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Servicio</th>
                <th>Usuario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiales as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->fecha }}</td>
                <td>{{ $item->Descripcion }}</td>
                <td>{{ $item->servicio->nombre ?? 'N/A' }}</td>
                <td>{{ $item->user->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('editar.historial_servicio.form', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('eliminar.historial_servicio', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este registro?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

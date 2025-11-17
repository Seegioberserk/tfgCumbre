@extends('layout.app')

@section('content')
<div class="container">
    <h1>Categorías</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('crear.categoria.form') }}" class="btn btn-primary mb-3">Nueva Categoría</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->Nombre }}</td>
                <td>{{ $categoria->Descripcion }}</td>
                <td>
                    <a href="{{ route('editar.categoria.form', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('eliminar.categoria', $categoria->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta categoría?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

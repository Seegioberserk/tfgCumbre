@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Categoría</h1>

    <form action="{{ route('editar.categoria', $categoria->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3">{{ $categoria->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('index.categoria') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

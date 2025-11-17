@extends('layout.app')

@section('content')
<div class="container">
    <h1>Nueva Categoría</h1>

    <form action="{{ route('crear.categoria') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('index.categoria') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

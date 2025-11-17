@extends('layout.app')

@section('content')
<div class="container">
    <h1>Nuevo Producto</h1>

    <form action="{{ route('crear.producto') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Nombre" class="form-label">Nombre</label>
            <input type="text" name="Nombre" id="Nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select name="id_categoria" id="id_categoria" class="form-select" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->Nombre }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{{ route('index.producto') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

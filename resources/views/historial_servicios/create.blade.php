@extends('layout.app')

@section('content')
<div class="container">
    <h1>Nuevo Historial de Servicio</h1>

    <form action="{{ route('crear.historial_servicio') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_servicio" class="form-label">Servicio</label>
            <select name="id_servicio" id="id_servicio" class="form-select" required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_user" class="form-label">Usuario</label>
            <select name="id_user" id="id_user" class="form-select" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('index.historial_servicio') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

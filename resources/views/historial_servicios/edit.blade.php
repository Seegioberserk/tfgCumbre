@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Historial de Servicio</h1>

    <form action="{{ route('editar.historial_servicio', $historial->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $historial->fecha }}" required>
        </div>

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{ $historial->Descripcion }}" required>
        </div>

        <div class="mb-3">
            <label for="id_servicio" class="form-label">Servicio</label>
            <select name="id_servicio" id="id_servicio" class="form-select" required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" {{ $historial->id_servicio == $servicio->id ? 'selected' : '' }}>
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_user" class="form-label">Usuario</label>
            <select name="id_user" id="id_user" class="form-select" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ $historial->id_user == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('index.historial_servicio') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

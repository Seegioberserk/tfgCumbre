@extends('layout.app')

@section('content')
<div class="container">
    <h1>Nuevo Diagnóstico</h1>

    <form action="{{ route('crear.diagnostico') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <input type="text" name="Descripcion" id="Descripcion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="CostoEstimado" class="form-label">Costo Estimado</label>
            <input type="number" step="0.01" name="CostoEstimado" id="CostoEstimado" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_servicio" class="form-label">Servicio Asociado</label>
            <select name="id_servicio" id="id_servicio" class="form-select" required>
                <option value="">Seleccione un servicio</option>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}">{{ $servicio->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{{ route('index.diagnostico') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

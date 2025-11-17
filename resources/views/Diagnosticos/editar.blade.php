@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Diagnóstico</h1>

    <form action="{{ route('editar.diagnostico', $diagnostico->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="Descripcion" class="form-label">Descripción</label>
            <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{ $diagnostico->Descripcion }}" required>
        </div>

        <div class="mb-3">
            <label for="CostoEstimado" class="form-label">Costo Estimado</label>
            <input type="number" step="0.01" name="CostoEstimado" id="CostoEstimado" class="form-control" value="{{ $diagnostico->CostoEstimado }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control" 
                   value="{{ \Carbon\Carbon::parse($diagnostico->fecha)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label for="id_servicio" class="form-label">Servicio Asociado</label>
            <select name="id_servicio" id="id_servicio" class="form-select" required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" 
                        {{ $servicio->id == $diagnostico->id_servicio ? 'selected' : '' }}>
                        {{ $servicio->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="{{ route('index.diagnostico') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

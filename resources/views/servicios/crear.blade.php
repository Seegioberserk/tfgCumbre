@extends('layout.app')

@section('content')
<div class="container">
    <h1>Nuevo Servicio</h1>

    <form action="{{ route('guardar.servicio') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="FechaIngreso" class="form-label">Fecha de Ingreso</label>
            <input type="date" name="FechaIngreso" id="FechaIngreso" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="FechaEntrega" class="form-label">Fecha de Entrega</label>
            <input type="datetime-local" name="FechaEntrega" id="FechaEntrega" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="id_equipo" class="form-label">Equipo</label>
            <select name="id_equipo" id="id_equipo" class="form-select" required>
                <option value="">Seleccione un equipo</option>
                @foreach($equipos as $equipo)
                    <option value="{{ $equipo->id }}">{{ $equipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_tipo_servicio" class="form-label">Tipo de Servicio</label>
            <select name="id_tipo_servicio" id="id_tipo_servicio" class="form-select" required>
                <option value="">Seleccione un tipo</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success" type="submit">Guardar</button>
        <a href="{{ route('index.servicio') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

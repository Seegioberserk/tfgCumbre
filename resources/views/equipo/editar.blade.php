@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Equipo</h1>

    <form action="{{ route('equipo.update', $equipo->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="Marca" class="form-label">Marca</label>
            <input type="text" name="Marca" id="Marca" class="form-control" value="{{ old('Marca', $equipo->Marca) }}" required>
        </div>

        <div class="mb-3">
            <label for="Modelo" class="form-label">Modelo</label>
            <input type="text" name="Modelo" id="Modelo" class="form-control" value="{{ old('Modelo', $equipo->Modelo) }}" required>
        </div>

        <div class="mb-3">
            <label for="Serie" class="form-label">Serie</label>
            <input type="text" name="Serie" id="Serie" class="form-control" value="{{ old('Serie', $equipo->Serie) }}" required>
        </div>

        <div class="mb-3">
            <label for="id_cliente" class="form-label">Cliente</label>
            <select name="id_cliente" id="id_cliente" class="form-select" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $equipo->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="{{ route('equipo.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

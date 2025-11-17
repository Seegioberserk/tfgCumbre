@extends('layout.app')

@section('content')
<div class="container">
    <h1>Editar Cliente</h1>
    <form action="{{ route('cliente.update', $cliente->id) }}" method="POST">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $cliente->name) }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $cliente->telefono) }}">
            @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $cliente->direccion) }}">
            @error('direccion') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
         <div class="mb-3">
            <label>ci</label>
            <input type="text" name="ci" class="form-control" value="{{ old('ci', $cliente->ci) }}">
            @error('ci') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
         <div class="mb-3">
            <label>Correo</label>
            <input type="text" name="correo" class="form-control" value="{{ old('correo', $cliente->direccion) }}">
            @error('correo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>



        <button class="btn btn-success">Actualizar</button>
        <a href="{{ route('index.cliente') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

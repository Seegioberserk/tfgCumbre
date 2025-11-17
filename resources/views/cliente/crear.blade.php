@extends('layout.app')

@section('content')
<div class="container">
    <h1>Agregar Cliente</h1>
    <form action="{{ route('cliente.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
            @error('telefono') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="mb-3">
            <label>Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
            @error('direccion') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
         <div class="mb-3">
            <label>ci</label>
            <input type="text" name="ci" class="form-control" value="{{ old('ci') }}">
            @error('ci') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
         <div class="mb-3">
            <label>Correo</label>
            <input type="text" name="correo" class="form-control" value="{{ old('correo') }}">
            @error('correo') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        
        
        <button class="btn btn-success">Guardar</button>
        <a href="{{ route('index.cliente') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

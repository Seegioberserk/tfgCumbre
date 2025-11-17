@extends('layout.app')
@section('content')
   <link rel="stylesheet" href="{{asset('css/crear.css')  }}">
    <div class="form-container">
        <h2 style="color: red;">Agregar Rol</h2>   

        <form action="{{ route('crear.rol') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Rol:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del rol" required>
                <input type="text" id="descripcion" name="descripcion" placeholder="descripcion" required>
            </div>
   
            <div class="form-actions">
                <button type="submit" class="btn-guardar">Guardar</button>
                <a href="{{ route('index.rol') }}" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
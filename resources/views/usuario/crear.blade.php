@extends('layout.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">

    <main class="content">
        <div class="header-section">
            <h1>Crear Usuario</h1>
            <a class="btn-back" href="{{ route('index.usuario') }}">Volver</a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('crear.usuario') }}" method="POST" enctype="multipart/form-data" class="form-card">
            @csrf

            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" name="username" id="username" class="form-control" required value="{{ old('username') }}">
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <select name="id_rol" id="id_rol" class="form-control" required>
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->Nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="foto">Foto de Perfil (opcional):</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn-add">Guardar</button>
                <a href="{{ route('index.usuario') }}" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </main>
</div>
@endsection

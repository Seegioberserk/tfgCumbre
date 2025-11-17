@extends('layout.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="{{ asset('css/crear.css') }}">

    <main class="content">
        <div class="header-section">
            <h1>Editar Usuario</h1>
            <a class="btn-back" href="{{ route('index.usuario') }}">Volver</a>
        </div>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('editar.usuario') }}" method="POST" enctype="multipart/form-data" class="form-card">
            @csrf
            <input type="hidden" name="id" value="{{ $dato->id }}">

            <div class="form-group">
                <label for="username">Nombre de Usuario:</label>
                <input type="text" name="username" id="username" class="form-control"
                       value="{{ old('username', $dato->username) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" name="email" id="email" class="form-control"
                       value="{{ old('email', $dato->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña (dejar vacío para no cambiar):</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="id_rol">Rol:</label>
                <select name="id_rol" id="id_rol" class="form-control">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" {{ $rol->id == $dato->id_rol ? 'selected' : '' }}>
                            {{ $rol->Nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Foto actual:</label><br>
                @if ($dato->foto)
                    <img src="{{ asset('storage/' . $dato->foto) }}" alt="Foto de {{ $dato->username }}"
                         width="80" height="80" style="border-radius:50%;object-fit:cover;">
                @else
                    <span style="color: gray;">Sin foto</span>
                @endif
            </div>

            <div class="form-group">
                <label for="foto">Nueva Foto (opcional):</label>
                <input type="file" name="foto" id="foto" class="form-control" accept="image/*">
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn-add">Actualizar</button>
                <a href="{{ route('index.usuario') }}" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </main>
</div>
@endsection

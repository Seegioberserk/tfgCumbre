@extends('layout.app')
@section('content')
    <div class="row">
        <link rel="stylesheet" href="{{ asset('css/generalTable.css') }}">

        <main class="content">
            <div class="header-section">
                <h1 style="color: #030303">Gestión de Roles</h1>    
                <a class="btn-add" href="{{ route('index.crear.rol') }}">Agregar Rol</a>
            </div>

            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                        <tr>
                            
                            <td>{{ $dato->id }}</td>
                            <td>{{ $dato->Nombre }}</td>
                            <td>{{ $dato->Descripcion }}</td>                 
                            <td class="acciones">
                                <form action="{{ route('index.editar.rol') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $dato->id }}">  
                                    <button class="btn-edit" type="submit">Editar</button>
                                </form>

                                <form action="{{ route('eliminar.rol') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $dato->id }}">  
                                    <button class="btn-delete" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
@endsection
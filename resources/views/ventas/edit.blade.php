@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Editar Venta #{{ $venta->id }}</h2>

    <form action="{{ route('venta.update', $venta->id) }}" method="POST">
        @csrf
        @method('PATCH')
        @include('ventas.partials.form')
        
    </form>
</div>
@endsection

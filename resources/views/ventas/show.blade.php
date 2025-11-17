@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Detalles de Venta #{{ $venta->id }}</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Fecha:</strong> {{ $venta->fecha }}</li>
        <li class="list-group-item"><strong>Total:</strong> {{ $venta->Total }}</li>
        <li class="list-group-item"><strong>Cliente:</strong> {{ $venta->cliente->nombre ?? '—' }}</li>
        <li class="list-group-item"><strong>Usuario:</strong> {{ $venta->usuario->name ?? '—' }}</li>
        <li class="list-group-item"><strong>Diagnóstico:</strong> {{ $venta->diagnostico->descripcion ?? '—' }}</li>
        <li class="list-group-item"><strong>Producto:</strong> {{ $venta->producto->nombre ?? '—' }}</li>
    </ul>

    <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

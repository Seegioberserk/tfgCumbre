@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2>Nueva Venta</h2>

    <form action="{{ route('venta.store') }}" method="POST">
        @csrf
        @include('ventas.partials.form', ['venta' => new \App\Models\Venta])
       
    </form>
</div>
@endsection

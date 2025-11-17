<form action="{{ route('venta.store') }}" method="POST" class="venta-form">
    @csrf

    {{-- Fecha --}}
    <div class="mb-3">
        <label class="form-label">Fecha</label>
        <input type="date" name="fecha" class="form-control" value="{{ old('fecha', $venta->fecha ?? '') }}" required>
    </div>

    {{-- Total --}}
    <div class="mb-3">
        <label class="form-label">Total</label>
        <input type="number" name="Total" class="form-control" step="0.01" value="{{ old('Total', $venta->Total ?? '') }}" required>
    </div>

    {{-- Fila: Cliente y Usuario --}}
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Cliente</label>
            <select name="id_cliente" class="form-select" required>
                <option value="">-- Seleccione Cliente --</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ old('id_cliente', $venta->id_cliente ?? '') == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Usuario</label>
            <select name="id_user" class="form-select" required>
                <option value="{{ auth()->id() }}" selected>
                    {{ auth()->user()->name }}
                </option>
            </select>
        </div>
    </div>

    {{-- Fila: Producto y Diagnóstico --}}
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Producto</label>
            <select name="id_producto" class="form-select" required>
                <option value="">-- Seleccione Producto --</option>
                @foreach($productos as $prod)
                    <option value="{{ $prod->id }}" {{ old('id_producto', $venta->id_producto ?? '') == $prod->id ? 'selected' : '' }}>
                        {{ $prod->Nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Diagnóstico</label>
            <select name="id_diagnostico" class="form-select" required>
                <option value="">-- Seleccione Diagnóstico --</option>
                @foreach($diagnosticos as $diag)
                    <option value="{{ $diag->id }}" {{ old('id_diagnostico', $venta->id_diagnostico ?? '') == $diag->id ? 'selected' : '' }}>
                        {{ $diag->Descripcion }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Botones --}}
    <div class="button-section mt-4">
        <button type="submit" class="btn-add">💾 Guardar</button>
        <a href="{{ route('venta.index') }}" class="btn-cancel">❌ Cancelar</a>
    </div>
</form>

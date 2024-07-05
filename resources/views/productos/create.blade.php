@extends('layout.app')

@section('title', 'Agregar Producto')

@section('content')
<div class="container">
    <h1>Agregar Producto</h1>
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" required>
        </div>
        <div class="mb-3">
            <label for="id_proveedor" class="form-label">Proveedor</label>
            <select class="form-control" id="id_proveedor" name="id_proveedor" required>
                <option value="">Seleccione un proveedor</option>
                @foreach($proveedores as $proveedor)
                    <option value="{{ $proveedor->id_proveedor }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="id_marca" class="form-label">Marca</label>
            <select class="form-control" id="id_marca" name="id_marca" required>
                <option value="">Seleccione una marca</option>
                @foreach($marcas as $marca)
                    <option value="{{ $marca->id_marca }}">{{ $marca->nombre }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Producto</button>
    </form>
</div>
@endsection


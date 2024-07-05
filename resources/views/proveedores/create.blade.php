@extends('layout.app')

@section('title', 'Agregar Proveedor')

@section('content')
<div class="container">
    <h1>Agregar Proveedor</h1>
    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar Proveedor</button>
    </form>
</div>
@endsection

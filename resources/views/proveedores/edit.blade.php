@extends('layouts.app')

@section('title', 'Editar Proveedor')

@section('content')
<div class="container">
    <h1>Editar Proveedor</h1>
    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="mail" class="form-label">Mail</label>
            <input type="text" class="form-control" id="mail" name="mail" value="{{ $proveedor->mail }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $proveedor->direccion }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
    </form>
</div>
@endsection

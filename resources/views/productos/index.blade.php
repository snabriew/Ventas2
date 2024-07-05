@extends('layout.app')

@section('title', 'Listado de Productos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Productos</h1>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar Producto</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Cantidad</th>
                <th>Proveedor</th>
                <th>Marca</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->proveedor_nombre }}</td>
                    <td>{{ $producto->marca_nombre }}</td>
                    <td>
                        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

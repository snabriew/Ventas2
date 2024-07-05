@extends('layout.app')

@section('title', 'Listado de Marcas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Marcas</h1>
        <a href="{{ route('marcas.create') }}" class="btn btn-primary">Agregar Marca</a>
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
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->id_marca }}</td>
                    <td>{{ $marca->nombre }}</td>
                    <td>
                        <a href="{{ route('marcas.edit', $marca->id_marca) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('marcas.destroy', $marca->id_marca) }}" method="POST" style="display:inline-block;">
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

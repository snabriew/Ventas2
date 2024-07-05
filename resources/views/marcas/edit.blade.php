@extends('layout.app')

@section('title', 'Editar Marca')

@section('content')
    <h1>Editar Marca</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('marcas.update', $marca->id_marca) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $marca->nombre) }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
    </form>
@endsection

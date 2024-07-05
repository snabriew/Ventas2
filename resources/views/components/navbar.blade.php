<!-- navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand m-1 p-1" href="/">Ventas</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('clientes.index') }}">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('marcas.index') }}">Marcas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('proveedores.index') }}">Proveedores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productos.index') }}">Productos</a>
            </li>
        </ul>
    </div>
</nav>

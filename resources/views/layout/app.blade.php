<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    <!-- Estilos CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos CSS personalizados -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Estilos CSS específicos para el footer -->
    <style>
        html, body {
            height: 100%;
        }

        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Establece el mínimo al 100% del viewport height */
        }

        .content {
            flex: 1; /* El contenido ocupa todo el espacio restante */
        }

        .footer {
            flex-shrink: 0; /* El footer no se encoge */
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Navbar -->
        @include('components.navbar')

        <!-- Contenido de la página -->
        <div class="content">
            <div class="container mt-4">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('components.footer')
    </div>

    <!-- Scripts JavaScript de Bootstrap (requiere Popper.js y jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <!-- Scripts JavaScript personalizados -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>



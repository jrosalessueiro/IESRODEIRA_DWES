<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Definimos la codificación de caracteres como UTF-8 -->
    <meta charset="UTF-8">
    <!-- Establecemos la vista de la página para que sea responsive en dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Título de la página que puede ser sobreescrito por cada vista -->
    <title>@yield('pageTitle', 'Juego Online')</title>

    <!-- Importamos la hoja de estilo de Bootstrap desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Importamos los iconos de Bootstrap desde el CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

</head>

<!-- Cuerpo del documento, contiene el layout principal -->

<body class="p-3 text-info-emphasis bg-light border border-primary-subtle rounded-3">
    <!-- Contenedor principal de la página con la clase Bootstrap "container" -->
    <div class="container">
        <!-- Fila que contiene el título de la página -->
        <div class="row my-4 text-center">
            <div class="col">
                <!-- El título se puede sobrescribir mediante @yield -->
                <h2>@yield('titulo', 'Título por Defecto')</h2>
            </div>
        </div>

        <!-- Si existe una alerta en la sesión, la mostramos -->
        @if (isset($_SESSION['alert']))
            <div class="alert alert-{{ $_SESSION['alert']['type'] }}" role="alert">
                <!-- Mostramos el mensaje de la alerta -->
                {{ $_SESSION['alert']['message'] }}
            </div>
        @endif

        <!-- Fila donde se insertará el contenido específico de cada vista -->
        <div class="row my-4">
            <!-- La directiva @yield se utiliza para insertar el contenido de las vistas -->
            @yield('contenido')
        </div>

    </div>
</body>

</html>

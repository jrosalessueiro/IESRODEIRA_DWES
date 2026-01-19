@extends('base')

@section('pageTitle', 'Listado Jugadores')
<!-- Establece el título de la página para esta vista, que se inyecta en la plantilla base en la sección 'pageTitle' -->

@section('titulo', 'Listado Jugadores')
<!-- Define el título del contenido principal de la página, que se inyecta en la sección 'titulo' -->

@section('contenido')
<!-- Inicia la sección 'contenido' que será inyectada en el layout base -->

<!-- Contenido de la página -->
<div class="row my-4">
    <!-- Fila de contenido con margen vertical -->
    <div class="col">
        <!-- Columna para el botón de creación de nuevo jugador -->
        <a class="btn btn-success btn-lg" href="fcrear.php">
            <!-- Botón grande de color verde con texto "Nuevo Jugador" que redirige a la página 'fcrear.php' -->
            +Nuevo Jugador
        </a>
    </div>
</div>

<!-- Fila para la tabla de jugadores -->
<div class="row my-4 text-center">
    <!-- Columna para centrar la tabla -->
    <div class="col-12 col-md-8 col-lg-8 mx-auto">
        <!-- Tabla con bordes y filas alternadas con color -->
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="table-primary">
                    <!-- Fila de encabezado con fondo color primario -->
                    <th>Nombre Completo</th>
                    <!-- Columna para mostrar el nombre completo del jugador -->
                    <th>Posición</th>
                    <!-- Columna para mostrar la posición del jugador -->
                    <th>Dorsal</th>
                    <!-- Columna para mostrar el dorsal del jugador -->
                    <th>Código de Barras</th>
                    <!-- Columna para mostrar el código de barras del jugador -->
                </tr>
            </thead>
            <tbody>
                <!-- Ciclo para iterar sobre cada jugador -->
                @foreach ($jugadores as $jugador)
                    <tr>
                        <!-- Fila para cada jugador -->
                        <td class="text-start">
                            <!-- Muestra el nombre completo del jugador (apellidos, nombre) con formato seguro -->
                            {{ htmlspecialchars($jugador['apellidos'] . ', ' . $jugador['nombre']) }}
                        </td>
                        <td class="text-center">
                            <!-- Muestra la posición del jugador, obtenida a través del código de posición -->
                            {{ htmlspecialchars(getPositionByCod($jugador['posicion'])['nombre']) }}
                        </td>
                        <td class="text-center">
                            <!-- Muestra el dorsal del jugador o "Sin Asignar" si no tiene dorsal asignado -->
                            {{ $jugador['dorsal'] ? htmlspecialchars($jugador['dorsal']) : 'Sin Asignar' }}
                        </td>
                        <td class="d-flex justify-content-center align-items-center">
                            <!-- Muestra el código de barras del jugador utilizando un gestor de códigos de barras -->
                            {!! $barcodeManager->printCode(code: $jugador['code']) !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
<!-- Finaliza la sección 'contenido' -->
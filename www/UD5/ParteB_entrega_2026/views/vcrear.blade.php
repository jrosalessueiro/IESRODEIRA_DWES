@extends('base') 
<!-- Extiende la plantilla base, lo que permite usar el layout y las secciones definidas en 'base' -->

@section('pageTitle', 'Crear Jugador') 
<!-- Establece el título de la página para esta vista. Se inyecta en la plantilla base en la sección 'pageTitle' -->

@section('titulo', 'Crear Jugador') 
<!-- Define el título que se mostrará en el contenido principal de la página, en la sección 'titulo' -->

@section('contenido')
<!-- Inicia la sección 'contenido' que será inyectada en el layout base -->

<!-- Formulario para crear un nuevo jugador -->
<div class="row my-4">
    <form method="POST" action="crearJugador.php">
        <!-- Fila con los campos de nombre y apellidos -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre:</label><br>
                <input class="form-control" type="text" id='nombre' name="nombre" placeholder="Nombre" required>
                <!-- Campo para ingresar el nombre del jugador -->
            </div>
            <div class="col-md-6 mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label><br>
                <input class="form-control" type="text" id='apellidos' name="apellidos" placeholder="Apellidos" required><br>
                <!-- Campo para ingresar los apellidos del jugador -->
            </div>
        </div>

        <!-- Fila con los campos de dorsal, posición y código de barras -->
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="dorsal" class="form-label">Dorsal:</label><br>
                <select class="form-select" id="dorsal" name="dorsal">
                    <option value="" disabled selected>Dorsal</option>
                    <!-- Menú desplegable para seleccionar el dorsal, con valores del 1 al 99 -->
                    @for ($i = 1; $i <= 99; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="posicion" class="form-label">Posición:</label><br>
                <select class="form-select" id="posicion" name="posicion" required>
                    <!-- Menú desplegable para seleccionar la posición del jugador -->
                    @foreach ($posiciones as $posicion)
                        <option value="{{ $posicion['cod'] }}">{{ $posicion['nombre'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="code" class="form-label">Código de Barras:</label><br>
                <input class="form-control" type="text" id="code" name="code" placeholder="Código de Barras" readonly
                value="{{ isset($_SESSION['codigo']) ? $_SESSION['codigo'] : '-' }}">
                <!-- Campo para el código de barras, que se carga con el valor de la sesión si está disponible -->
            </div>
        </div>

        <!-- Fila con los botones de acción -->
        <div class="row">
            <div class="col-md-12">
                <!-- Botón para enviar el formulario y crear el jugador -->
                <button class="btn btn-primary btn-md" type="submit">Crear</button>
                <!-- Botón para limpiar el formulario -->
                <button class="btn btn-success btn-md" type="reset">Limpiar</button>
                <!-- Enlace para volver al índice de jugadores -->
                <a class="btn btn-danger btn-md" href="index.php">Volver</a>
                <!-- Enlace para generar un nuevo código de barras -->
                <a class="btn btn-warning btn-md" href="generarCode.php">Generar código</a>
            </div>
        </div>
    </form>
</div>

@endsection
<!-- Finaliza la sección 'contenido' -->
@extends('base')

@section('pageTitle', 'Instalación') 
<!-- Establece el título de la página para esta vista, que se inyecta en la plantilla base en la sección 'pageTitle' -->

@section('titulo', 'Instalación') 
<!-- Define el título del contenido principal de la página, que se inyecta en la sección 'titulo' -->

@section('contenido')
<!-- Inicia la sección 'contenido' que será inyectada en el layout base -->

<!-- Contenido de la página centrado en pantalla -->
<div class="d-flex justify-content-center align-items-center custom-box">
    <!-- Contenedor principal con clases de estilo para centrar y aplicar diseño personalizado -->
    <div class="bg-success text-white p-5 rounded text-center shadow w-45">
        <!-- Contenedor de fondo verde con texto blanco, con padding y bordes redondeados -->
        <div class="col-md-12">
            <!-- Columna para el botón de acción -->
            <a class="btn btn-primary btn-md p-3" href="crearDatos.php">
                <!-- Enlace con estilo de botón que redirige a la página 'crearDatos.php' -->
                <i class="bi bi-database"></i> Instalar Datos de Ejemplo
                <!-- Icono de base de datos y texto de instalación de datos -->
            </a>
        </div>
    </div>
</div>

@endsection
<!-- Finaliza la sección 'contenido' -->
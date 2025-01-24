<?php

// Importa la clase Blade para gestionar plantillas
use Jenssegers\Blade\Blade;

// Incluye el archivo con las funciones relacionadas con la base de datos
require __DIR__ . '/../src/database.php';

// Inicia la sesión para gestionar datos persistentes durante la navegación
session_start();

// Obtiene las posiciones disponibles 
$posiciones = getPositions();

// Crea una instancia de Blade para gestionar las vistas y la caché
$blade = new Blade(__DIR__.'/../views', __DIR__.'/../cache');

// Renderiza la plantilla 'vcrear' pasando las posiciones obtenidas como variable
echo $blade->make('vcrear', ['posiciones' => $posiciones])->render();

// Limpia la variable de sesión 'alert' después de usarla
unset($_SESSION['alert']);

?>
Cambios realizados:
Comentarios añadidos:

<?php

// Se requiere el archivo database.php, que contiene las funciones relacionadas con la base de datos
require __DIR__ . '/../src/database.php';

// Se importa la clase Blade del paquete Jenssegers\Blade para manejar plantillas
use Jenssegers\Blade\Blade;

// Definición de las rutas a las vistas y a la caché de Blade
$views = __DIR__ . '/views'; // Carpeta donde se almacenan las plantillas
$cache = __DIR__ . '/cache'; // Carpeta donde se almacena la caché de las plantillas

// Se crea una instancia de Blade, el motor de plantillas
$blade = new Blade($views, $cache);

// Redirige a 'jugadores.php' si existen jugadores en la base de datos, o a 'instalacion.php' si no hay jugadores.
header('Location: ' . (getAllPlayers() != null ? 'jugadores.php' : 'instalacion.php'));
exit();

?>
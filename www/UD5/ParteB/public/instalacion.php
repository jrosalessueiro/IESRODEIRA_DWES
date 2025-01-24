<?php
// Importa la clase Blade para usar el motor de plantillas
use Jenssegers\Blade\Blade;

// Incluye las funciones relacionadas con la base de datos
require __DIR__ . '/../src/database.php';

// Crea una instancia de Blade, especificando las rutas de las vistas y el directorio de caché
$blade = new Blade(__DIR__.'/../views', __DIR__.'/../cache');

// Renderiza la vista 'vinstalacion' utilizando Blade y muestra su contenido
echo $blade->make('vinstalacion')->render();
?>
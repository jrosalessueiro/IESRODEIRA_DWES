<?php

// Importa la clase BarcodeManager (gestión de códigos de barras)
use Dwes5B\BarcodeManager;
// Importa la clase Blade para usar el motor de plantillas
use Jenssegers\Blade\Blade;

// Incluye las funciones relacionadas con la base de datos
require __DIR__ . '/../src/database.php';

// Obtiene todos los jugadores desde la base de datos
$jugadores = getAllPlayers();

// Crea una instancia de BarcodeManager para gestionar los códigos de barras
$barcodeManager = new BarcodeManager();

// Crea una instancia de Blade, especificando las rutas de las vistas y el directorio de caché
$blade = new Blade(__DIR__.'/../views', __DIR__.'/../cache');

// Renderiza la vista 'vjugadores', pasando los datos de jugadores y el gestor de códigos de barras como variables
echo $blade->make('vjugadores', ['jugadores' => $jugadores, 'barcodeManager' => $barcodeManager])->render();

?>
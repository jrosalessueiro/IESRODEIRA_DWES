<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// TAREA6/public/tiendas.php

// 1. Esto carga automáticamente BladeOne desde la carpeta vendor
require_once __DIR__ . '/../vendor/autoload.php';

use eftec\bladeone\BladeOne;

// 2. Configuración de rutas
$views = __DIR__ . '/../views';
$cache = __DIR__ . '/../cache';

// 3. Instancia de la clase
$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

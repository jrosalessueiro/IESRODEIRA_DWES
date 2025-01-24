<?php

// Inicia una sesión para almacenar datos entre diferentes peticiones HTTP
session_start();

// Incluye las dependencias de Composer (por ejemplo, Faker) y las funciones de base de datos
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/database.php';

// Variables para almacenar el código de barras generado y el jugador correspondiente
$codigoBarras = null;
$jugador = null;

// Crea una instancia de Faker para generar datos aleatorios
$faker = Faker\Factory::create();

// Genera un código de barras único
do {
    // Genera un código EAN-13 aleatorio
    $code = $faker->ean13();

    // Comprueba si ya existe un jugador con este código de barras en la base de datos
    $jugador = getPlayerByBarcode($code);
} while ($jugador); // Repite hasta generar un código único

// Almacena el código de barras único en la sesión
$_SESSION['codigo'] = $code;

// Redirige al formulario de creación de jugador
header(header: 'Location: fcrear.php');

?>

<?php

session_start();

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/database.php';

$codigoBarras = null;
$jugador = null;
$faker = Faker\Factory::create();

do {
    $code = $faker->ean13();
    $jugador = getPlayerByBarcode($code);
} while ($jugador);

$_SESSION['codigo'] = $code;

header(header: 'Location: fcrear.php');

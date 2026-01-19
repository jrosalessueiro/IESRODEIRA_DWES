<?php

// Incluye el archivo que contiene las funciones relacionadas con la base de datos
require __DIR__ . '/../src/database.php';

// Llama a la función para generar datos falsos y almacenarlos en la base de datos
createData();

// Redirige al archivo jugadores.php después de generar los datos
header('Location: jugadores.php');
exit();

?>

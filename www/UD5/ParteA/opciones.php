<?php

// Inicia la sesión
session_start();

// Define los arrays de opciones con id y texto
$idiomas = [
    ['id' => 0, 'texto' => 'No Establecido'],
    ['id' => 1, 'texto' => 'Español'],
    ['id' => 2, 'texto' => 'Inglés'],
    ['id' => 3, 'texto' => 'Gallego'],
    ['id' => 4, 'texto' => 'Alemán']
];

$perfiles = [
    ['id' => 0, 'texto' => 'No Establecido'],
    ['id' => 1, 'texto' => 'Público'],
    ['id' => 2, 'texto' => 'Privado']
];

$zonas = [
    ['id' => 0, 'texto' => 'No Establecido'],
    ['id' => 1, 'texto' => 'GMT-2'],
    ['id' => 2, 'texto' => 'GMT-1'],
    ['id' => 3, 'texto' => 'GMT'],
    ['id' => 4, 'texto' => 'GMT+1'],
    ['id' => 5, 'texto' => 'GMT+2']
];

// Función para obtener el texto asociado al id
function obtenerTexto($array, $id)
{
    foreach ($array as $elemento) {
        if ($elemento['id'] == $id) {
            return $elemento['texto'];
        }
    }
    return 'No establecido';
}
?>




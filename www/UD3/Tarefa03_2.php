<?php

// Incluir las clases desde el archivo 'clases.php'
require_once 'Tarefa03_1.php';

// Más adelante usaremos spl_autoload_register() 
$tiposClases = ['Administrativo', 'Conserje', 'PersonalDeLimpieza', 'Profesor', 'AlumnadoEso', 'AlumnadoBachillerato', 'AlumnadoFP'];

// Crear un array de 100 objetos aleatorios
$objetos = [];
for ($i = 0; $i < 100; $i++) {
    $tipoClase = $tiposClases[rand(0, 6)]; // Elegir un tipo de clase aleatorio
    $objetos[] = $tipoClase::generarAlAzar(); // Añadir el objeto al array
}

// Mostrar cuántos objetos de cada clase se crearon
foreach($tiposClases as $tipoClase) {
    echo "Se crearon {$tipoClase::numeroObjetosCreados()} objetos de la clase '$tipoClase'.<br>";
}

// Llamar al método 'trabajar()' para cada objeto
foreach ($objetos as $objeto) {
    echo $objeto->trabajar() . "<br>";
}

?>
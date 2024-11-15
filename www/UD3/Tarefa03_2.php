<?php

// Incluir las clases desde el archivo 'clases.php'
require_once 'clases.php';

// Inicializar contadores de clases
$contadorAdministrativo = 0;
$contadorConserje = 0;
$contadorPersonalDeLimpieza = 0;
$contadorProfesor = 0;
$contadorAlumnadoEso = 0;
$contadorAlumnadoBachillerato = 0;
$contadorAlumnadoFP = 0;

// Crear un array de 100 objetos aleatorios
$objetos = [];
for ($i = 0; $i < 100; $i++) {
    $clase = rand(1, 7); // Elegir aleatoriamente una clase entre 1 y 7
    switch ($clase) {
        case 1:
            $objeto = Administrativo::generarAlAzar();
            $contadorAdministrativo++;
            break;
        case 2:
            $objeto = Conserje::generarAlAzar();
            $contadorConserje++;
            break;
        case 3:
            $objeto = PersonalDeLimpieza::generarAlAzar();
            $contadorPersonalDeLimpieza++;
            break;
        case 4:
            $objeto = Profesor::generarAlAzar();
            $contadorProfesor++;
            break;
        case 5:
            $objeto = AlumnadoEso::generarAlAzar();
            $contadorAlumnadoEso++;
            break;
        case 6:
            $objeto = AlumnadoBachillerato::generarAlAzar();
            $contadorAlumnadoBachillerato++;
            break;
        case 7:
            $objeto = AlumnadoFP::generarAlAzar();
            $contadorAlumnadoFP++;
            break;
    }
    $objetos[] = $objeto; // Añadir el objeto al array
}

// Mostrar cuántos objetos de cada clase se crearon
echo "Se crearon {$contadorAdministrativo} objetos de la clase Administrativo.<br>";
echo "Se crearon {$contadorConserje} objetos de la clase Conserje.<br>";
echo "Se crearon {$contadorPersonalDeLimpieza} objetos de la clase PersonalDeLimpieza.<br>";
echo "Se crearon {$contadorProfesor} objetos de la clase Profesor.<br>";
echo "Se crearon {$contadorAlumnadoEso} objetos de la clase AlumnadoEso.<br>";
echo "Se crearon {$contadorAlumnadoBachillerato} objetos de la clase AlumnadoBachillerato.<br>";
echo "Se crearon {$contadorAlumnadoFP} objetos de la clase AlumnadoFP.<br><br>";

// Llamar al método 'trabajar()' para cada objeto
foreach ($objetos as $objeto) {
    echo $objeto->trabajar() . "<br>";
}

?>
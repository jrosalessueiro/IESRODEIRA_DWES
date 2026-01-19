<?php
require_once 'clases.php';

// Contadores locales (tu estilo)
$contadorAdministrativo = 0;
$contadorConserje = 0;
$contadorPersonalDeLimpieza = 0;
$contadorProfesor = 0;
$contadorAlumnadoESO = 0;
$contadorAlumnadoBachillerato = 0;
$contadorAlumnadoFP = 0;

// Array de 100 objetos aleatorios
/** @var Persona[] $objetos */
$objetos = [];

for ($i = 0; $i < 100; $i++) {
    $clase = rand(1, 7);

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
            $objeto = AlumnadoESO::generarAlAzar();
            $contadorAlumnadoESO++;
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

    $objetos[] = $objeto;
}

// Mostrar contadores (tu estilo)
echo "<h3>Contadores (según creación en el script)</h3>";
echo "Se crearon {$contadorAdministrativo} objetos de la clase Administrativo.<br>";
echo "Se crearon {$contadorConserje} objetos de la clase Conserje.<br>";
echo "Se crearon {$contadorPersonalDeLimpieza} objetos de la clase PersonalDeLimpieza.<br>";
echo "Se crearon {$contadorProfesor} objetos de la clase Profesor.<br>";
echo "Se crearon {$contadorAlumnadoESO} objetos de la clase AlumnadoESO.<br>";
echo "Se crearon {$contadorAlumnadoBachillerato} objetos de la clase AlumnadoBachillerato.<br>";
echo "Se crearon {$contadorAlumnadoFP} objetos de la clase AlumnadoFP.<br><br>";

// Mostrar contadores de clase (lo que pedía el enunciado)
echo "<h3>Contadores (según numeroObjetosCreado() de cada clase)</h3>";
echo "Administrativo: " . Administrativo::numeroObjetosCreado() . "<br>";
echo "Conserje: " . Conserje::numeroObjetosCreado() . "<br>";
echo "PersonalDeLimpieza: " . PersonalDeLimpieza::numeroObjetosCreado() . "<br>";
echo "Profesor: " . Profesor::numeroObjetosCreado() . "<br>";
echo "AlumnadoESO: " . AlumnadoESO::numeroObjetosCreado() . "<br>";
echo "AlumnadoBachillerato: " . AlumnadoBachillerato::numeroObjetosCreado() . "<br>";
echo "AlumnadoFP: " . AlumnadoFP::numeroObjetosCreado() . "<br><br>";

// Polimorfismo: todos tienen trabajar()
echo "<h3>trabajar() de cada objeto</h3>";
foreach ($objetos as $objeto) {
    echo $objeto->trabajar() . "<br>";
}

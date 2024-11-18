<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["numero"]) && is_numeric($_POST["numero"])) { // Validar que el dato existe y es numérico
        $numberString = (string) $_POST["numero"]; // Convertir el número a cadena
        $arrayNumber = str_split($numberString); // Dividir la cadena en un array de cifras
        $result = implode('    ', $arrayNumber); // Unir las cifras con espacios
        echo "Resultado: $result"; // Mostrar el resultado
    } else {
        echo 'Error: Introduzca un número válido, por favor.';
    }
} else {
    echo 'Error: Los datos no se han transmitido correctamente.';
}

?>
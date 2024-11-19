<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["tope"]) && is_numeric($_POST["tope"])) {
        $tope  = $_POST["tope"];
        $suma = 0;
        $i = 0;

        if ($tope < 7) {
            echo 'La suma de los múltiplos de 7 desde 0 hasta ' . $tope . ' es: 0.';
        } else {
            while ($i < $tope) {
                $suma += $i;
                $i += 7;
            }
            echo 'La suma de los múltiplos de 7 desde 0 hasta ' . $tope . ' es: ' . $suma;
        }
    } else {
        echo 'Error: Introduce un número positivo entero válido.';
    }
} else {
    echo 'Error: Los tados no se han transmitido correctamente.';
}
?>
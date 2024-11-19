<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["number1"]) && is_numeric($_POST["number1"])) {
        $number1 = $_POST["number1"];
        $j = 0;

        if ($number1 >= 1 && $number1 <= 20) {
            for ($i = 0; $i < $number1; $i++) {
                for ($j = 0; $j < $number1; $j++) {
                    echo '*'; // Imprime un asterisco
                }
                echo '<br>'; // Salto de línea para pasar a la siguiente fila
            }
        } else {
            echo 'Error. Introduzca un número válido entre 1-20.';
        }
    } else {
        echo 'Error: Los datos no se han transmitido correctamente.';
    }
} else {
    echo 'Error: Los datos no se han transmitido correctamente.';
}

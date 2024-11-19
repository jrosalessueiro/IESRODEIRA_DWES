<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["number1"]) && is_numeric($_POST["number1"])) {
        $number1 = (int)$_POST["number1"]; // Convertir a entero

        if ($number1 >= 1 && $number1 <= 20) {
            echo '<pre>'; // Mantener formato de espacios y saltos de línea
            for ($i = 0; $i < $number1; $i++) {
                for ($j = 0; $j < $number1; $j++) {
                    // Imprimir asterisco en los bordes
                    if ($i == 0 || $i == $number1 - 1 || $j == 0 || $j == $number1 - 1) {
                        echo '*';
                    } else {
                        echo ' '; // Espacio en blanco dentro del marco
                    }
                }
                echo "\n"; // Salto de línea para la siguiente fila
            }
            echo '</pre>';
        } else {
            echo '<p style="color: red;">Error. Introduzca un número válido entre 1 y 20.</p>';
        }
    } else {
        echo '<p style="color: red;">Error. Introduzca un número válido entre 1 y 20.</p>';
    }
} else {
    echo '<p style="color: red;">Error: Los datos no se han transmitido correctamente.</p>';
}
?>
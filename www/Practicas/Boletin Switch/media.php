<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["cantidad"]) && is_numeric($_POST["cantidad"])) {
        $cantidad = (int) $_POST["cantidad"];
        if ($cantidad < 1) {
            echo "Error: Introduzca un número mayor o igual a 1.";
            exit;
        }

        echo '<form action="media.php" method="post">';
        echo '<input type="hidden" name="cantidad" value="' . $cantidad . '">';

        for ($i = 1; $i <= $cantidad; $i++) {
            echo '<label for="numero' . $i . '">Número ' . $i . ':</label>';
            echo '<input type="number" id="numero' . $i . '" name="numeros[]" required><br><br>';
        }

        echo '<button type="submit">Calcular</button>';
        echo '</form>';

    } elseif (isset($_POST["numeros"])) {
        // SEGUNDO FORMULARIO: Procesar los números introducidos
        $numeros = $_POST["numeros"];
        if (is_array($numeros)) {
            $suma = 0;
            $cantidad = count($numeros);

            foreach ($numeros as $numero) {
                if (!is_numeric($numero)) {
                    echo "Error: Todos los valores deben ser números válidos.";
                    exit;
                }
                $suma += $numero;
            }

            $media = $suma / $cantidad;
            echo "La suma de los números es: " . $suma . "<br>";
            echo "La media de los números es: " . $media;
        } else {
            echo "Error: No se han recibido números válidos.";
        }
    } else {
        echo "Error: Los datos no se han transmitido correctamente.";
    }
} else {
    echo "Error: Solicitud incorrecta.";
}
?>
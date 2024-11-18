<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["pares"])) {

        $number = $_POST["pares"];
        if ($number % 2 == 0) {
            echo '<h2>El número ' . $number . ' es PAR</h2>';
        } else {
            echo '<h2>El número ' . $number . ' es IMPAR</h2>';
        }
    } else {
        echo '<p>Los datos no se han transmitido correctamente. Por favor, introduzca un número válido</p>';
    }
} else {
    echo "<p>Error: No se enviaron datos correctamente.</p>";
}

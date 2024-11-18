<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["number1"], $_POST["number2"]) && is_numeric($_POST["number1"]) && is_numeric($_POST["number2"])) {
        $number1 = $_POST["number1"];
        $number2 = $_POST["number2"];

        if ($number1 % $number2 == 0 || $number2 % $number1 == 0) {
            echo 'Los números ' . $number1 . ' y ' . $number2 . ' son múltiplos entre sí.';
        } else {
            echo 'Los números ' . $number1 . ' y ' . $number2 . ' no son múltiplos entre sí.';
        }
    } else {
        echo 'Error: Por favor, introduzca números válidos.';
    }
} else {
    echo 'Error. Los datos no se han transmitido correctamente. Introduzca números válidos.';
}
?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['number1']) && isset($_POST['number2']) && isset($_POST['number3'])) {

        $number1 = floatval($_POST['number1']);
        $number2 = floatval($_POST['number2']);
        $number3 = floatval($_POST['number3']);

        if ($number1 != $number2 && $number1 != $number3 && $number2 != $number3) {
            $suma = $number1 + $number2 + $number3;
            $producto = $number1 * $number2 * $number3;
            $mayor = $menor = $number1;

            $mayor = $number1 > $number2 ? ($number1 > $number3 ? $number1 : $number3) : ($number2 > $number3 ? $number2 : $number3);
            $menor = $number1 > $number2 ? ($number2 > $number3 ? $number3 : $number2) : ($number1 > $number3 ? $number3 : $number1);

            echo '<h2>La suma es: '.$suma. '</h2>';
            echo '<h2>La media es:' . ($suma / 3) . '</h2>';
            echo '<h2>El producto es: '. $producto.'</h2>';
            echo '<h2>El mayor de todos es: '.$mayor. '</h2>';
            echo '<h2>El menor de todos es: '.$menor. '</h2>';
        } else {
            echo "<p>Debe introducir números diferentes.</p>";
        }
    } else {
        echo "<p>Error: No se enviaron datos correctamente. Por favor, introduzca tres números válidos.</p>";
    }
} else {
    echo "<p>Error: No se enviaron datos correctamente.</p>";
}

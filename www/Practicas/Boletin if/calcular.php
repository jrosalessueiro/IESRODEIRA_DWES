
<?php
// Verificar si los datos se enviaron mediante POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger los datos del formulario
    if (is_numeric($_POST["number1"]) && is_numeric($_POST["number2"])) {

        $number1 = floatval($_POST['number1']);

        $number2 = floatval($_POST['number2']);
    } else {
        echo "Debe introducir número válidos.";
    }
    $suma = $number1 + $number2;
    $resta = $number1 - $number2;
    $multiplicacion = $number1 * $number2;
    $resto = $number1 % $number2;

    // Responder al usuario
    echo "<h2>La suma es: $suma</h2>";
    echo "<h2>La resta es: $resta</h2>";
    echo "<h2>El producto es: $multiplicacion</h2>";
    echo "<h2>El resto es: $resto</h2>";
} else {
    echo "<p>Error: No se enviaron datos correctamente.</p>";
}
?>



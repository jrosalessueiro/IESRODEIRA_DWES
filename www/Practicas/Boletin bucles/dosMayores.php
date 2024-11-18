<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $arrayNumeros = [];

    // Validar y agregar números al array
    for ($i = 1; $i <= 10; $i++) { // Cambié el rango a 1-10 porque típicamente defines 10 números
        $key = "number" . $i;
        if (isset($_POST[$key]) && is_numeric($_POST[$key])) {
            $arrayNumeros[] = $_POST[$key];
        } else {
            echo "Error: asegúrese de introducir números válidos para number{$i}.";
            exit;
        }
    }

    // Encontrar los dos números más grandes
    if (count($arrayNumeros) >= 2) {
        $result = max($arrayNumeros); // El número más grande
        $index = array_search($result, $arrayNumeros); // Índice del número más grande
        unset($arrayNumeros[$index]); // Eliminarlo del array

        $result2 = max($arrayNumeros); // El segundo número más grande
        $index2 = array_search($result2, $arrayNumeros); // Índice del segundo número más grande
        unset($arrayNumeros[$index2]); // Eliminarlo también

        // Mostrar resultados
        echo "El número más grande es: $result<br>";
        echo "El segundo número más grande es: $result2<br>";
        echo "Array restante: " . implode(", ", $arrayNumeros);
    } else {
        echo "Error: Se necesitan al menos 2 números.";
    }
}
?>
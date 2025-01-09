<?php

// Función para generar los primeros términos de la serie de Fibonacci
function generarFibonacci($n) {
    $fibonacci = [1, 1];
    for ($i = 2; $i < $n * $n; $i++) {
        $fibonacci[] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return $fibonacci;
}

// Función para imprimir un número formateado con puntos y ancho fijo
function imprimirTermino($numero, $anchoMaximo) {
    $longitudNumero = strlen((string)$numero); // Obtiene la cantidad de dígitos del número
    $puntos = str_repeat(".", $anchoMaximo - $longitudNumero); // Calcula los puntos necesarios
    return $puntos . $numero;
}

// Función para generar el cuadrado de Fibonacci con el marco
function generarCuadradoFibonacci($n) {
    // Generar los primeros N*N términos de Fibonacci
    $fibonacci = generarFibonacci($n * $n); 
    
    // Encuentra el número más grande de los términos generados (solo hasta el N*N)
    $maxTermino = max(array_slice($fibonacci, 0, $n * $n));
    
    // Determina el ancho máximo de acuerdo al número más grande
    $anchoMaximo = strlen((string)$maxTermino);
    
    $resultado = [];
    $indiceFibonacci = 0;

    // Construir el cuadrado
    for ($fila = 0; $fila < $n; $fila++) {
        $linea = [];
        for ($columna = 0; $columna < $n; $columna++) {
            // Si estamos en los bordes (marco exterior), mostramos el número de Fibonacci
            if ($fila === 0 || $fila === $n - 1 || $columna === 0 || $columna === $n - 1) {
                // Usar el término actual de Fibonacci para los bordes
                $linea[] = imprimirTermino($fibonacci[$indiceFibonacci], $anchoMaximo);
                $indiceFibonacci++;
            } else {
                // Espacio vacío en el interior
                $linea[] = str_repeat(" ", $anchoMaximo);
            }
        }
        $resultado[] = implode(" ", $linea);
    }

    return $resultado;
}

// Capturamos el valor introducido por el usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = isset($_POST['numero']) ? intval($_POST['numero']) : 0;

    if ($n >= 1 && $n <= 8) {
        $cuadrado = generarCuadradoFibonacci($n);

        echo "<pre style='background: #E3F6F5; padding: 10px; font-family: monospace;'>";
        foreach ($cuadrado as $linea) {
            echo htmlspecialchars($linea) . "\n";
        }
        echo "</pre>";
    } else {
        echo "<p style='color: red;'>Por favor, introduzca un número entre 1 y 8.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serie de Fibonacci</title>
</head>
<body>
    <form method="post" action="">
        <label for="numero">Introduzca un número entre 1 y 8:</label>
        <input type="number" id="numero" name="numero" min="1" max="8" required>
        <button type="submit">Enviar</button>
        <button type="reset">Reset</button>
    </form>
</body>
</html>
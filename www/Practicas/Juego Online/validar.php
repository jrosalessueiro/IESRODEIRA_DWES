<?php
session_start();

require __DIR__ . '/alert.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $lado = $_POST['filas'] ?? 0;
        $palabra = trim($_POST['palabra'] ?? '');

        // Validación del número de filas (impar entre 5 y 30)
        if ($lado % 2 === 0 || $lado < 5 || $lado > 30) {
            $alert = [
                'type' => 'danger',
                'message' => 'Debes introducir un número de filas y columnas impar entre 5 y 30.',
            ];
        }
        // Validación de la palabra (al menos 5 caracteres)
        elseif (strlen($palabra) < 5) {
            $alert = [
                'type' => 'danger',
                'message' => 'La palabra debe tener al menos 5 caracteres.',
            ];
        } else {
            // Si todo es correcto
            $alert = [
                'type' => 'success',
                'message' => 'El tablero se ha creado correctamente.',
            ];
        }
    } catch (Exception $e) {
        // Capturar errores y mostrar mensaje
        $alert = ['type' => 'danger', 'message' => $e->getMessage()];
    }

    // Redirigir de nuevo a index.php
    header("Location: index.php");
    exit;
}

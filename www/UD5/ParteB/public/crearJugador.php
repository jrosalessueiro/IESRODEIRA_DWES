<?php

require __DIR__ . '/../src/database.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recoger los datos enviados desde el formulario
        $data = [
            'nombre' => trim($_POST['nombre'] ?? ''),
            'apellidos' => trim($_POST['apellidos'] ?? ''),
            'dorsal' => $_POST['dorsal'] ?? null,
            'posicion' => $_POST['posicion'] ?? null,
            'code' => $_POST['code'] ?? null
        ];

        // Crear el jugador en la base de datos
        createPlayer($data);

        // Si se crea correctamente, redirigir o mostrar un mensaje de éxito
        $_SESSION['alert'] = ['type' => 'success', 'message' => 'Jugador creado correctamente.'];
    } catch (Exception $e) {
        // Capturar errores y mostrar mensaje
        $_SESSION['alert'] = ['type' => 'danger', 'message' => $e->getMessage()];
    }
}

header('Location: fcrear.php');

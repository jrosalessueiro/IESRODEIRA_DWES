<?php

// Incluye el archivo que contiene las funciones relacionadas con la base de datos
require __DIR__ . '/../src/database.php';

// Inicia la sesión para gestionar mensajes de alerta entre redirecciones
session_start();

// Verifica si la solicitud HTTP es de tipo POST (formulario enviado)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Recoger los datos enviados desde el formulario, asegurando que no haya espacios sobrantes
        $data = [
            'nombre' => trim($_POST['nombre'] ?? ''), // Nombre del jugador
            'apellidos' => trim($_POST['apellidos'] ?? ''), // Apellidos del jugador
            'dorsal' => $_POST['dorsal'] ?? null, // Número del dorsal (puede ser null)
            'posicion' => $_POST['posicion'] ?? null, // Posición en el campo (puede ser null)
            'code' => $_POST['code'] ?? null // Código único del jugador (puede ser null)
        ];

        // Crear el jugador en la base de datos
        createPlayer($data);

        // Si se crea correctamente, guardar un mensaje de éxito en la sesión
        $_SESSION['alert'] = [
            'type' => 'success', 
            'message' => 'Jugador creado correctamente.'
        ];
    } catch (Exception $e) {
        // Si ocurre un error, capturarlo y guardar un mensaje de error en la sesión
        $_SESSION['alert'] = [
            'type' => 'danger', 
            'message' => $e->getMessage()
        ];
    }
}

// Redirigir al formulario de creación de jugadores (fcrear.php)
header('Location: fcrear.php');
exit();

?>
<?php

// Definimos PDO como una variable global para poder reutilizar la misma conexión para todas las consultas.
$pdo = null;

function getConnection(): ?PDO
{
    // Importamos la variable $pdo del contexto global al contexto de la función.
    global $pdo;

    // Si ya existe una conexión a la base de datos, la retornamos y si no, la creamos más abajo.
    if ($pdo !== null) {
        return $pdo;
    }

    // Configuración de la base de datos
    $host = 'localhost';      // Nombre o dirección del servidor de base de datos
    $dbname = 'proyecto';     // Nombre de la base de datos a la que nos queremos conectar
    $username = 'gestor';     // Nombre de usuario para autenticar la conexión
    $password = 'secreto';    // Contraseña del usuario de la base de datos
    $charset = 'utf8mb4';     // Codificación de caracteres (más adecuada para caracteres especiales)

    try {
        // Definimos el DSN (Data Source Name) que contiene la información necesaria para la conexión
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

        // Creamos una nueva instancia de PDO (PHP Data Objects) para realizar la conexión a la base de datos
        // El objeto $pdo se utilizará para ejecutar consultas en la base de datos
        $pdo = new PDO($dsn, $username, $password);

        return $pdo;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}

<?php
// Configuración de la base de datos
$host = 'localhost';      // Nombre o dirección del servidor de base de datos
$dbname = 'proyecto';     // Nombre de la base de datos a la que nos queremos conectar
$username = 'gestor';     // Nombre de usuario para autenticar la conexión
$password = 'secreto';    // Contraseña del usuario de la base de datos

try {
    // Definimos el DSN (Data Source Name) que contiene la información necesaria para la conexión
    // En este caso estamos usando MySQL con codificación utf8mb4 (más adecuada para caracteres especiales)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

    // Creamos una nueva instancia de PDO (PHP Data Objects) para realizar la conexión a la base de datos
    // El objeto $pdo se utilizará para ejecutar consultas en la base de datos
    $pdo = new PDO($dsn, $username, $password);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
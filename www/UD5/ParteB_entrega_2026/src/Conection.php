<?php

class Conection
{
    /**
     * Propiedad estática que almacena la instancia única de la conexión PDO.
     * Inicialmente es null, lo que indica que no se ha creado una conexión.
     */
    private static $pdo = null;

    /**
     * Método estático para obtener la conexión a la base de datos.
     * Implementa el patrón Singleton para garantizar que solo exista una conexión.
     *
     * @return ?PDO Devuelve una instancia de PDO si la conexión es exitosa, o null si ocurre un error.
     */
    public static function getConnection(): ?PDO
    {
        // Si la conexión ya está creada, la devolvemos directamente.
        if (self::$pdo !== null) {
            return self::$pdo;
        }

        // Configuración para la conexión a la base de datos
        $host = 'localhost';      // Dirección del servidor de la base de datos
        $dbname = 'practicaunidad5'; // Nombre de la base de datos
        $username = 'gestor';     // Usuario con permisos para acceder a la base de datos
        $password = 'secreto';    // Contraseña del usuario
        $charset = 'utf8mb4';     // Codificación de caracteres para manejar texto especial

        try {
            // DSN (Data Source Name): información para la conexión al servidor MySQL
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

            // Crear una instancia de PDO con el DSN, usuario y contraseña
            self::$pdo = new PDO($dsn, $username, $password);

            // Configurar PDO para que arroje excepciones en caso de error
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Retornar la instancia de PDO
            return self::$pdo;

        } catch (PDOException $e) {
            // Capturar y mostrar el error si la conexión falla
            echo 'Error de conexión: ' . $e->getMessage();
            return null;
        }
    }
}
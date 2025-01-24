<?php

// Incluir los archivos necesarios
require_once 'Conection.php';  // Para la conexión a la base de datos
require_once 'Jugador.php';    // Para el manejo de los objetos de jugador

// Incluir el autoload de Composer para gestionar las dependencias
require __DIR__ . '/../vendor/autoload.php';

// Definir las posiciones de los jugadores con sus respectivos códigos y nombres
const POSICIONES = [
    '1' => ['cod' => 1, 'nombre' => 'Portero'],
    '2' => ['cod' => 2, 'nombre' => 'Lateral Derecho'],
    '3' => ['cod' => 3, 'nombre' => 'Lateral Izquierdo'],
    '4' => ['cod' => 4, 'nombre' => 'Central'],
    '5' => ['cod' => 5, 'nombre' => 'Extremo Derecho'],
    '6' => ['cod' => 6, 'nombre' => 'Extremo Izquierdo'],
    '7' => ['cod' => 7, 'nombre' => 'Medio Centro'],
    '8' => ['cod' => 8, 'nombre' => 'MediaPunta'],
    '9' => ['cod' => 9, 'nombre' => 'Delantero Centro'],
    '10' => ['cod' => 10, 'nombre' => 'Carrilero Derecha'],
    '11' => ['cod' => 11, 'nombre' => 'Carrilero Izquierda'],
    '12' => ['cod' => 12, 'nombre' => 'Interior Izquierda'],
    '13' => ['cod' => 13, 'nombre' => 'Interior Derecha'],
];

// Función para obtener todas las posiciones disponibles
function getPositions(): array
{
    return POSICIONES;
}

// Función para obtener una posición por su código
function getPositionByCod(string $cod): ?array
{
    return POSICIONES[$cod] ?? null;  // Devuelve la posición si existe, o null si no
}

// Obtener un jugador por su código de barras
function getPlayerByBarcode(string $code): array|false
{
    return Jugador::getPlayerByBarcode($code);  // Llama al método estático de la clase Jugador
}

// Obtener todos los jugadores de la base de datos
function getAllPlayers(): array
{
    $pdo = Conection::getConnection();  // Obtener la conexión PDO
    $stmt = $pdo->query('SELECT * FROM jugadores');  // Realiza la consulta SQL para obtener todos los jugadores
    return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Devuelve todos los jugadores como un array asociativo
}

// Obtener un jugador por su dorsal (número de camiseta)
function getPlayerByDorsal(int $dorsal): array|false
{
    return Jugador::getPlayerByDorsal($dorsal);  // Llama al método estático de la clase Jugador
}

// Función para crear un nuevo jugador
function createPlayer(array $data): void
{
    Jugador::create($data);  // Llama al método estático de la clase Jugador para crear el jugador
}

// Crear datos de prueba para los jugadores
function createData(): void
{
    // Usamos Faker para generar datos falsos
    $faker = Faker\Factory::create('es_ES');

    // Generar 15 jugadores de prueba
    for ($i = 0; $i <= 14; $i++) {
        try {
            // Crear un jugador con datos aleatorios
            $jugador = [
                'nombre' => $faker->firstName,  // Nombre del jugador
                'apellidos' => $faker->lastName . ' ' . $faker->lastName,  // Apellidos del jugador
                'posicion' => $faker->numberBetween(1, 13),  // Posición aleatoria entre 1 y 13
            ];

            // Asegurar que el dorsal sea único
            do {
                $jugador['dorsal'] = $faker->numberBetween(1, 20);  // Generar un dorsal aleatorio
            } while (getPlayerByDorsal($jugador['dorsal']));  // Verificar si el dorsal ya existe

            // Asegurar que el código de barras sea único
            do {
                $jugador['code'] = $faker->ean13();  // Generar un código de barras único
            } while (getPlayerByBarcode($jugador['code']));  // Verificar si el código ya existe

            // Intentar crear el jugador
            createPlayer($jugador);  // Crear el jugador en la base de datos
            echo "Jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . " añadido correctamente.<br>";
        } catch (Exception $e) {
            // Si ocurre un error, capturarlo y mostrar el mensaje
            echo "Error al añadir al jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . ": " . $e->getMessage() . "<br>";
        }
    }
}
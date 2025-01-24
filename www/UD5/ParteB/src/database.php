<?php

require 'conexion.php';
require __DIR__ . '/../vendor/autoload.php';

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

function getPositions(): array
{
    return POSICIONES;
}

function getPositionByCod(string $cod): ?array
{
    return POSICIONES[$cod] ?? null;
}

function getPlayerByBarcode(string $code): array|false
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        SELECT * FROM jugadores WHERE code = :code
    ');
    $stmt->bindParam(':code', $code);
    $stmt->execute();

    $jugador = $stmt->fetch();

    return $jugador;
}

function getAllPlayers(): array
{
    $pdo = getConnection();
    $stmt = $pdo->query('SELECT * FROM jugadores'); // Obtiene todos los jugadores
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array asociativo
}


function getPlayerByDorsal(int $dorsal): array|false
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        SELECT * FROM jugadores WHERE dorsal = :dorsal
    ');
    $stmt->bindParam(':dorsal', $dorsal);
    $stmt->execute();

    $jugador = $stmt->fetch();

    return $jugador;
}

function createPlayer(array $data): void
{
    validatePlayer($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        INSERT INTO jugadores (nombre, apellidos, dorsal, posicion, code) 
        VALUES (:nombre, :apellidos, :dorsal, :posicion, :code)
    ');
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':apellidos', $data['apellidos']);
    $stmt->bindParam(':dorsal', $data['dorsal']);
    $stmt->bindParam(':posicion', $data['posicion']);
    $stmt->bindParam(':code', $data['code']);


    $stmt->execute();
}

function createData(): void
{
    $faker = Faker\Factory::create('es-ES');

    for ($i = 0; $i = 14; $i++) {
        try {
            $jugador = [
                'nombre' => $faker->firstname,
                'apellidos' =>  $faker->lastName . ' ' . $faker->lastName,
                'dorsal' => $faker->numberBetween(1, 99),
                'posicion' => $faker->numberBetween(1, 13),
                'code' => $faker->ean13(),
            ];
            // Intenta crear el jugador
            createPlayer($jugador);
            echo "Jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . " añadido correctamente.<br>";
        } catch (Exception $e) {
            // Captura cualquier error y muestra el mensaje
            echo "Error al añadir al jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . ": " . $e->getMessage() . "<br>";
        }
    }
}

function validatePlayer(array $data): void
{
    if (!isset($data['nombre'])) {
        throw new Exception('El nombre es obligatorio');
    } elseif (!isset($data['apellidos'])) {
        throw new Exception('Los apellidos son obligatorios');
    } elseif (!isset($data['code'])) {
        throw new Exception('El código de barras es obligatorio');
    } elseif (!isset($data['posicion'])) {
        throw new Exception(message: 'La posicion es obligatoria');
    } elseif (isset($data['dorsal']) && getPlayerByDorsal($data['dorsal'])) {
        throw new Exception(message: 'El dorsal ya está ocupado por ' . $data['nombre'] . ' ' . $data['apellidos'] . ', elija otro dorsal');
    }
}

/*function updatePlayer(int $id, array $data): void
{
    validatePlayer($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        UPDATE jugadores 
        SET nombre = :nombre, apellidos = :apellidos, dorsal = :dorsal, posicion = :posicion, code = :code
        WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':apellidos', $data['apellidos']);
    $stmt->bindParam(':dorsal', $data['dorsal']);
    $stmt->bindParam(':posicion', $data['posicion']);
    $stmt->bindParam(':code', $data['code']);

    $stmt->execute();
}

function deletePlayer(int $id): void
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        DELETE FROM jugadores WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);

    $stmt->execute();
}
    
function getPlayer(int $id): array
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        SELECT * FROM jugadores WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $jugador = $stmt->fetch();

    if (!$jugador) {
        throw new Exception('Jugador no encontrado');
    }

    return $jugador;
}
    */
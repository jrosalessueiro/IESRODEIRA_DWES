<?php

require 'conexion.php';

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

function getAllPlayers(): array
{
    $pdo = getConnection();
    $stmt = $pdo->query('SELECT * FROM jugadores'); // Obtiene todos los jugadores
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve un array asociativo
}


function getDorsal(int $dorsal): bool
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        SELECT * FROM jugadores WHERE dorsal = :dorsal
    ');
    $stmt->bindParam(':dorsal', $dorsal);
    $stmt->execute();

    $jugador = $stmt->fetch();

    if (!$jugador) {
        return false;
    } else {
        return true;
    }
}

function createPlayer(array $data): void
{
    validatePlayer($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        INSERT INTO jugadores (nombre, apellidos, dorsal, posicion, barcode) 
        VALUES (:nombre, :apellidos, :dorsal, :posicion, :barcode)
    ');
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':apellidos', $data['apellidos']);
    $stmt->bindParam(':dorsal', $data['dorsal']);
    $stmt->bindParam(':posicion', $data['posicion']);
    $stmt->bindParam(':barcode', $data['barcode']);


    $stmt->execute();
}

function createData(): void
{
    // Lista de jugadores a insertar
    $jugadores = [
        ['nombre' => 'Antonio', 'apellidos' => 'Gil Gil', 'dorsal' => 1, 'posicion' => 'Portero', 'barcode' => '0952945303398'],
        ['nombre' => 'Ana', 'apellidos' => 'Hernandez Perez', 'dorsal' => 2, 'posicion' => 'Defensa Central', 'barcode' => '2406603743234'],
        ['nombre' => 'Juan', 'apellidos' => 'Valdemoro Gil', 'dorsal' => 3, 'posicion' => 'Lateral Derecho', 'barcode' => '2829114057100'],
        ['nombre' => 'Maria', 'apellidos' => 'Ruano Perez', 'dorsal' => 4, 'posicion' => 'Defensa Central', 'barcode' => '9745708466710']
    ];

    foreach ($jugadores as $jugador) {
        try {
            // Intenta crear el jugador
            createPlayer($jugador);
            echo "Jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . " añadido correctamente.<br>";
        } catch (Exception $e) {
            // Captura cualquier error y muestra el mensaje
            echo "Error al añadir al jugador " . $jugador['nombre'] . " " . $jugador['apellidos'] . ": " . $e->getMessage() . "<br>";
        }
    }
}

function updatePlayer(int $id, array $data): void
{
    validatePlayer($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        UPDATE jugadores 
        SET nombre = :nombre, apellidos = :apellidos, dorsal = :dorsal, posicion = :posicion, barcode = :barcode
        WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':apellidos', $data['apellidos']);
    $stmt->bindParam(':dorsal', $data['dorsal']);
    $stmt->bindParam(':posicion', $data['posicion']);
    $stmt->bindParam(':barcode', $data['barcode']);

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

function validatePlayer(array $data): void
{
    if (!isset($data['nombre'])) {
        throw new Exception('El nombre es obligatorio');
    } elseif (!isset($data['apellidos'])) {
        throw new Exception('Los apellidos son obligatorios');
    } elseif (!isset($data['dorsal'])) {
        throw new Exception('El dorsal es obligatorio');
    } elseif (!isset($data['posicion'])) {
        throw new Exception(message: 'La posicion es obligatoria');
    } elseif (getDorsal($data['dorsal']) === true) {
        throw new Exception(message: 'El dorsal ya está ocupado por ' . $data['nombre'] . ' ' . $data['apellidos'] . ', elija otro dorsal');
    }
}

function generateCode(): string
{
    $aleatorio12 = rand(0, 999999999999);

    $code12 = (string) str_pad($aleatorio12, 12, '0', STR_PAD_LEFT);
    $cifras = str_split($code12);

    $impares = 0;
    $pares = 0;

    for ($i = 0; $i < 11; $i++) {
        if ($i % 2 === 0) {
            $impares += $i * $cifras[$i];
        } else {
            $pares += $i * $cifras[$i];
        }
    }

    $resultado = $pares + $impares;
    $valor = 0;

    for ($j = $resultado; $j = $resultado + 10; $j++) {
        if ($j % 10 === 0) {
            $valor = $j;
            exit;
        }
    }

    array_push($cifras, $valor);

    $code13 = implode('', $cifras);

    return $code13;
}

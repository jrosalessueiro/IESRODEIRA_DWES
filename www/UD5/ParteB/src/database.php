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
    }else{
    return true;
    }
}

function createPlayer(array $data): void
{
    validatePlayer($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        INSERT INTO jugadores (nombre, apellidos, dorsal, posicion) 
        VALUES (:nombre, :apellidos, :dorsal, :posicion)
    ');
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':apellidos', $data['apellidos']);
    $stmt->bindParam(':dorsal', $data['dorsal']);
    $stmt->bindParam(':posicion', $data['posicion']);

    $stmt->execute();
}

function updatePlayer(int $id, array $data): void
{
    validatePlayer($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        UPDATE jugadores 
        SET nombre = :nombre, apellidos = :apellidos, dorsal = :dorsal, posicion = :posicion
        WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':apellidos', $data['apellidos']);
    $stmt->bindParam(':dorsal', $data['dorsal']);
    $stmt->bindParam(':posicion', $data['posicion']);

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
    } elseif (getDorsal($data['dorsal']) === true){
        throw new Exception(message: 'El dorsal ya está ocupado por ' +$data['nombre'] + ' ' + $data['apellidos'] + ', elija otro dorsal');
    } 
}

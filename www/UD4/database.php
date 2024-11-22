<?php

require 'conexion.php';

function getFamilias(): array
{
    $pdo = getConnection();
    $stmt = $pdo->query('
        SELECT * FROM familias
    ');

    return $stmt->fetchAll();
}

function getProductos(): array
{
    $pdo = getConnection();
    $stmt = $pdo->query('
        SELECT * FROM productos
    ');

    return $stmt->fetchAll();
}

function getProducto(int $id): array
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        SELECT * FROM productos WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $producto = $stmt->fetch();

    if (!$producto) {
        throw new Exception('Producto no encontrado');
    }

    return $producto;
}

function createProducto(array $data): void
{
    validateProducto($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        INSERT INTO productos (nombre, nombre_corto, pvp, familia, descripcion) 
        VALUES (:nombre, :nombreCorto, :precio, :familia, :descripcion)
    ');
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':nombreCorto', $data['nombreCorto']);
    $stmt->bindParam(':precio', $data['precio']);
    $stmt->bindParam(':familia', $data['familia']);
    $stmt->bindParam(':descripcion', $data['descripcion']);

    $stmt->execute();
}

function updateProducto(int $id, array $data): void
{
    validateProducto($data);

    $pdo = getConnection();
    $stmt = $pdo->prepare('
        UPDATE productos 
        SET nombre = :nombre, nombre_corto = :nombreCorto, pvp = :precio, familia = :familia, descripcion = :descripcion
        WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nombre', $data['nombre']);
    $stmt->bindParam(':nombreCorto', $data['nombreCorto']);
    $stmt->bindParam(':precio', $data['precio']);
    $stmt->bindParam(':familia', $data['familia']);
    $stmt->bindParam(':descripcion', $data['descripcion']);

    $stmt->execute();
}

function deleteProducto(int $id): void
{
    $pdo = getConnection();
    $stmt = $pdo->prepare('
        DELETE FROM productos WHERE id = :id
    ');
    $stmt->bindParam(':id', $id);

    $stmt->execute();
}

function validateProducto(array $data): void
{
    if (!isset($data['nombre'])) {
        throw new Exception('El nombre es obligatorio');
    } elseif (!isset($data['nombreCorto'])) {
        throw new Exception('El nombre corto es obligatorio');
    } elseif (!isset($data['precio'])) {
        throw new Exception('El precio es obligatorio');
    } elseif (!isset($data['familia'])) {
        throw new Exception('La familia es obligatoria');
    } elseif (!isset($data['descripcion'])) {
        throw new Exception('La descripción es obligatoria');
    }
}

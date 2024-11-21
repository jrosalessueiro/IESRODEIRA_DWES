<?php
require 'conexion.php';

function getFamilias(): array {
    try {
        $pdo = getConnection();
        // Consulta SQL para obtener todas las familias de productos de manera única
        $getFamiliasSql = "SELECT DISTINCT familia FROM productos";
        $getFamiliasStmt = $pdo->query($getFamiliasSql);
        $familias = $getFamiliasStmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Extrae solo los valores de 'familia' y los guarda en un array
        return array_column($familias, 'familia');
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        exit();
    }
} 
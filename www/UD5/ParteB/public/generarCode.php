<?php

require __DIR__ . '/../src/database.php';
require __DIR__ . '/../src/header.php';
require __DIR__ . '/../src/alert.php';

$codigoBarras = null;
$jugador = null;

// Generar y verificar el código de barras
while (!$jugador) {
    $codigoBarras = generateCode();

    $pdo = getConnection();
    $stmt = $pdo->prepare('SELECT * FROM jugadores WHERE barcode = :barcode');
    $stmt->bindParam(':barcode', $codigoBarras);
    $stmt->execute();

    $jugador = $stmt->fetch(); // Si no encuentra, $jugador será false
}

// En este punto, $codigoBarras es único y válido
require __DIR__ . '/../src/footer.php';